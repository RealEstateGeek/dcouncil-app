@extends('components/layout')

@section('content')
    <article>
        <h1>
            {{ $post->title }} By {{ $post->user->name }}
        </h1>
        <div>
            {!! $post->body !!}
        </div>
    </article>
    <a href="/posts">Back to posts</a>
@endsection
