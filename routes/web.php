<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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

Route::get('posts', [PostController::class, 'index'])->name('home');
Route::get('posts/{post}', [PostController::class, 'view']);
Route::post('posts/{post:id}/comment', [CommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'logout'])->middleware('auth');
Route::get('login', [SessionController::class, 'login'])->middleware('guest')->name('login');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::get('commentTable', [CommentController::class, 'viewTable']);

Route::post('newsletter', NewsletterController::class);

Route::get('admin/posts/{post:id}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post:id}', [AdminPostController::class, 'update'])->middleware('admin');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
