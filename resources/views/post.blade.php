@extends('components/layout')

@section('content')
    <article>
        <h1>
            {{ $post->title }} By <a href="/posts/{{ $post->user->id }}">{{ $post->user->name }}</a>
        </h1>
        <div>
            {!! $post->body !!}
        </div>
    </article>
    <a href="/posts">Back to posts</a>
@endsection
