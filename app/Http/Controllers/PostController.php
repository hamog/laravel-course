<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //$name = request('test');
//        [
//            'name' => 'John'
//        ]
//        [
//            0 => 1, 1 => 2, 2 => 3
//        ]

        $users = collect([
            ['id' => 1, 'name' => 'ali'],
            ['id' => 2, 'name' => 'reza'],
            ['id' => 3, 'name' => 'hasan'],
            ['id' => 4, 'name' => 'pooya'],
        ]);

        return view('post.index', [
            'name' => 'John',
            'family' => 'Doe',
            'numbers' => range(1, 100),
            'users' => $users,
            'users2' => User::all()
        ]);
    }
}
