<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    /**
     * Display a form for creating a new blog post
     */
    public function create()
    {
        return view('admin.posts.create');
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

    public function index()
    {
        return view(
            'admin.posts.index',
            [
                'posts' => Post::paginate(50),
            ]
        );
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
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
                    'image',
                ],
            ]
        );

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('registerSuccess', 'Post Updated');
    }
}
