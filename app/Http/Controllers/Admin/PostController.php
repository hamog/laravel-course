<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Sms;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Http\Requests\Admin\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private function checkAuthorization(Post $post)
    {
        if (request()->user()->cannot('update', $post)) {
            abort(403);
        }
    }

    public function index()
    {
        $posts = Post::query()
            ->orderBy('id', 'desc')
            ->where('user_id', auth()->user()->id)
            ->paginate();

        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Cache::rememberForever('categories', function () {
            return Category::query()
                ->orderBy('name')
                ->pluck('name', 'id');
        });
        $tags = Cache::rememberForever('tags', function () {
            return  Tag::query()
                ->orderBy('name')
                ->pluck('name', 'id');
        });

        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request, Sms $sms)
    {
        try {

           // $sms->send('0911258777', 'dashasdfashfasdhf');

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $path = $request->file('image')->store('images', 'public');
            } else {
                $path = null;
            }

            $post = Post::query()->create([
                'user_id' => auth()->user()->id,
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'image' => $path,
                'status' => $request->has('status'),
                'published_at' => $request->input('published_at')
            ]);

            if ($request->input('tags')) {
                foreach ($request->input('tags') as $tagId) {
                    $post->tags()->attach($tagId);
                }
            }

            return redirect()->route('admin.posts.index')
                ->with('success', 'خبر با موفقیت ثبت شد.');
        } catch (Exception $exception) {
            Log::error('Post store error: ' . $exception->getMessage());
            return redirect()->route('admin.posts.index')
                ->with('error', 'ثبت خبر متاسفانه با خطا مواجه شد.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::query()->findOrFail($id);
        $this->checkAuthorization($post);

        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::query()->findOrFail($id);

//        if (! Gate::allows('update-post', $post)) {
//            abort(403);
//        }
        $this->checkAuthorization($post);

        $categories = Category::query()
            ->orderBy('name')
            ->pluck('name', 'id');
        $tags = Tag::query()
            ->orderBy('name')
            ->pluck('name', 'id');

        return view('admin.post.edit', compact('categories', 'post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
        $post = Post::query()->findOrFail($id);
//        if (! Gate::allows('update-post', $post)) {
//            abort(403);
//        }

        $this->checkAuthorization($post);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = $request->file('image')->store('images', 'public');
        } else {
            $path = null;
        }


        $post->update([
            'user_id' => 1,
            'category_id' => 3,
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image' => $path,
            'status' => $request->has('status'),
            'published_at' => $request->input('published_at')
        ]);

        if ($request->input('tags')) {
            $post->tags()->sync($request->input('tags'));
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'خبر با موفقیت به روزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::query()->findOrFail($id);
//        if (! Gate::allows('update-post', $post)) {
//            abort(403);
//        }

        $this->checkAuthorization($post);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'خبر با موفقیت  حذف شد.');
    }
}
