<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //session()->flash('status', 'به داشبورد خوش امدید!');

    return redirect()->route('admin.dashboard')
        ->with('status', 'به داشبورد خوش امدید!');
});

Route::prefix('admin')->name('admin.')->group(function () {
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    //posts
    Route::resource('/posts', PostController::class);
});
