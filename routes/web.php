<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentController;





Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments',[PostCommentController::class,'store']);

Route::get('register' ,[RegisterController::class, 'create'] )->middleware('guest');
Route::post('register' ,[RegisterController::class, 'store'] )->middleware('guest');

Route::get('login' ,[SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout' ,[SessionController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create', [PostController::class,'create'])->middleware('admin');
Route::post('admin/posts',[PostController::class, 'store'])->middleware('admin');

