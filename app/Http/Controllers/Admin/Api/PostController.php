<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        //404, 422, 400, 429, 403, 401, 200

        $posts = Post::query()
            ->orderBy('id', 'desc')
            ->select(['id', 'title', 'image'])
            ->get();

        //return response()->success(compact('posts'));
        return new PostCollection($posts);
    }

    public function show($id)
    {
        $post = Post::find($id);

        $post->increment('views_count');

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'مطلب مورد نظر یافت نشد!',
                'data' => []
            ]);
            return response()->error('مطلب مورد نظر یافت نشد!', 404);
        }

//        return response()->json([
//            'success' => true,
//            'message' => null,
//            'data' => compact('post')
//        ]);

        return new PostResource($post);
    }
}

