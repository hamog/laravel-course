<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

//Auth
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    //auth
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index')->middleware('throttle:3,1');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    //posts
    Route::resource('/posts', PostController::class);
});
