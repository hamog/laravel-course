<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //session()->flash('status', 'به داشبورد خوش امدید!');

    return redirect()->route('admin.dashboard')
        ->with('status', 'به داشبورد خوش امدید!');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
});
