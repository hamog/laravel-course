<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        //session()->put('name', 'John');
        //Session::put(['name' => 'John']);
        //Session::forget('name');

//        $users = DB::select('Select * From sessions');
//        dd($users);

        return view('admin.dashboard');
    }
}
