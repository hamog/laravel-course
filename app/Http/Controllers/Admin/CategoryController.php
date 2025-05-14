<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('id', 'desc')->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
//        request('name');
//        Request::input('name');

        Category::query()->create([
            'name' => $request->input('name'),
            'status' => $request->has('status')
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'دسته بندی با موفقیت ثبت شد.');
    }

    public function edit(string $id)
    {
        $category = Category::query()->find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::query()->find($id);

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
