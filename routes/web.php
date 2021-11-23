<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

Route::get('/posts', function () {
    // start a query object, we call get in the return statement
    $posts = Post::latest()->with('category', 'user');

    // If we have GET parameters on the URI, use them to filter results
    if (request('search')) {
        $posts->where('title', 'LIKE', '%' . request('search') . '%')
            ->orWhere('body', 'LIKE', '%' . request('search') . '%');
    }

    return view('posts', [
        'posts' => $posts->get(),
        'categories' => Category::all(),
    ]);
});

// Route-model binding, when we type-hint 'Post' here, it tries to find a Post using binding key 'id'
// For tweaking, see Post->getRouteKeyName
Route::get('/posts/{post}', function(Post $post) {
    return view('post', [
        'post' => $post,
    ]);
});

// Using the category slug to display all posts related to a particular category
Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all(),
    ]);
});

//Using the user ID to display all posts related to a particular User
Route::get('/users/{user}', function (User $user) {
    return view('posts', [
        'posts' => $user->posts,
        'categories' => Category::all(),
    ]);
});
