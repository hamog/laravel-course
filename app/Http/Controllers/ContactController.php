<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        //dd(request()->query('type', 'default'));
        //dd(\Illuminate\Support\Facades\Request::query('type'));

        return view('contact');
    }

    public function store(Request $request, int $id)
    {
        //dd($request->all(), $request->input('email'));
        //dd($id);
        //dd($request->fullUrl());
        //$request->route('name');

        //insert into database

        Log::info('Contact store...', [$request->all()]);

        return redirect()->route('contact.index');
    }
}
