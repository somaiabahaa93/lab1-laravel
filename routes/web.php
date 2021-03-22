<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts',[postController::class,'index'])->name('posts.index')->middleware(['auth']);
Route::get('/posts/create',[postController::class,'create'])->name('posts.create')->middleware(['auth']);;
Route::get('/posts/{post}/edit',[postController::class,'edit'])->name('posts.edit')->middleware(['auth']);;
Route::get('/posts/{post}',[postController::class,'show'])->name('posts.show')->middleware(['auth']);;
Route::put('/posts/{post}',[postController::class,'update'])->name('posts.update')->middleware(['auth']);;
Route::post('/posts',[postController::class,'store'])->name('posts.store')->middleware(['auth']);;
Route::delete('/posts/{post}',[postController::class,'destroy'])->name('posts.destroy')->middleware(['auth']);;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
