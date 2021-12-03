<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'user']))
                ->with('category', 'user')
                ->paginate()->withQueryString(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * @param Post $post
     */
    public function view(Post $post)
    {
        // Route-model binding, when we type-hint 'Post' in this function, it tries to find a Post using binding key 'id'
        // For tweaking the key, see Post->getRouteKeyName()
        return view(
            'posts.view',
            [
                'post' => $post,
            ]
        );
    }

    /**
     * Display a form for creating a new blog post
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Take form data and create/store a new post object
     */
    public function store()
    {
        $attributes = request()->validate(
            [
                'title' => 'required',
                'excerpt' => 'required',
                'body' => 'required',
                'category_id' => [
                    'required',
                    Rule::exists('categories', 'id'),
                ],
                'thumbnail' => [
                    'required',
                    'image',
                ],
            ]
        );
        $attributes['user_id'] = auth()->user()->id;
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/posts');
    }
}
