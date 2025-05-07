<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        //select * from categories
        //select id,name from categories
        $categories = DB::table('categories')->get(['id', 'name']);

        //condition
        $categories2 = DB::table('categories')
            ->where('id', '>', 2)
            ->get(['id', 'name']);

        $categories2 = DB::table('categories')
            ->where('id', 2)
            ->update([
                'status' => false
            ]);

        $deleted = DB::table('categories')
            ->where('status', 0)
            ->delete();

        dd($deleted);
    }
}
