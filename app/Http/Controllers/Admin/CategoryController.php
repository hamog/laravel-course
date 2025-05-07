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
        $categories = Category::all();
//        $categories = Category::query()
//            ->where('status', 1)
//            ->whereDate('created_at', '>', now()->addDay(2))
//              ->orderBy('id', 'desc')
//            ->get();

        return view('admin.category.index', compact('categories'));
    }

    public function show(string $id)
    {
        $category = Category::query()->find($id);
        //$category = Category::query()->findOrFail($id);
        //$category = Category::query()->orderBy('id', 'desc')->first();

        dd($category);
    }

    public function create()
    {
        $category = new Category();
        $category->name = 'fdhashfdah';
        $category->save();

        Category::query()->create([
            'name' => 'fdhashfdah'
        ]);
    }

    public function destroy(string $id)
    {
        $category = Category::query()->find($id);
        $category->delete();

    }
}
