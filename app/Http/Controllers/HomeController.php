<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
        //return response()->json([1,2,3]);
    }

    public function about()
    {
        return view('about');
    }

    public function greeting()
    {
        return view('greeting');
    }
}
