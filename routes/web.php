<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//Route::view('/', 'welcome');
//
//Route::get('/contact', function (\Illuminate\Http\Request $request) {
//    return 'Hello World!';
//})->name('contact');
//
//Route::post('/contact-store/{user_id}/comment/{comment}', function () {
//    return 'Hello World!';
//})->name('contact_store');
//
//Route::options('/update', function () {
//    return 'Hello World!';
//});
//
//Route::delete('/delete', function () {
//    return 'Hello World!';
//});
//
//Route::match(['get', 'post'], '/multi', function () {
//    return 'Hello World!';
//});
//
//Route::any('/any', function () {
//    return 'Hello World!';
//});
//
////request
////Route::get('/', function () {
////
////    //response
////    return view('');
////});
//
//Route::get('/about', function () {
//    return view('about');
//})->middleware(\App\Http\Middleware\CheckName::class . ':john');
//
////Route::redirect('/', '/login');
//
//Route::get('/user/{id}', function (int $id) {
//
//    return 'User '. $id;
//});
//
//Route::get('/customer/{name?}', function (?string $name = 'mohammad') {
//    return $name;
//});


//url('/contact-store/10/comment/5');
//\route('contact_store', [10, 5]);

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/greeting', [HomeController::class, 'greeting']);
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/{id}', [ContactController::class, 'store'])->name('contact.store');

Route::get('/posts', [PostController::class, 'index']);

Route::resource('categories', CategoryController::class);
