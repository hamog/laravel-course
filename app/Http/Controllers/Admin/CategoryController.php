<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('id', 'desc')->paginate(20);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryStoreRequest $request)
    {
//        request('name');
//        Request::input('name');
//        $request->validate([
//            'name' => 'required|string|max:100|unique:categories',
//            'status' => 'required|boolean'
//        ]);

        Category::query()->create([
            'name' => $request->input('name'),
            'status' => $request->has('status')
        ]);

//        $category = new Category();
//        $category->name = $request->input('name');
//        $category->status = $request->has('status');
//        $category->save();

        return redirect()->route('admin.categories.index')
            ->with('success', 'دسته بندی با موفقیت ثبت شد.');
    }

    public function edit(string $id)
    {
        $category = Category::query()->find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, string $id)
    {
//        $request->validate([
//            'name' => [
//                'required',
//                'string',
//                'max:100',
//                Rule::unique('categories')->ignore($id)
//            ],
//            'status' => 'required|boolean'
//        ]);

        $category = Category::query()->find($id);
//        $category->name = $request->input('name');
//        $category->status = $request->has('status');
//        $category->save();


        $category->update([
            'name' => $request->input('name'),
            'status' => $request->has('status')
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'دسته بندی با موفقیت به روزرسانی شد.');
    }

    public function destroy(string $id)
    {
        $category = Category::query()->find($id);
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'دسته بندی با موفقیت حذف شد.');
    }
}
