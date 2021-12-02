<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @param Post $post
     */
    public function store(Post $post)
    {
        request()->validate(
            [
                'body' => ['required'],
            ]
        );

        // sanitize???
        $post->comments()->create(
            [
                'body' => request('body'),
                'user_id' => request()->user()->id,
            ]
        );

        return back();
    }

    public function viewTable()
    {
        return view('comments.commentTable', ['comments' => Comment::all()]);
    }
}
