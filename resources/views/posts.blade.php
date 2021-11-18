@extends('components/layout')

@section('content')
    @foreach ($posts as $post)
        <article>
            <a href="posts/{{ $post->id }}">{{ $post->title }}</a>
            <br/>
            {{ $post->excerpt }}
        </article>
    @endforeach
@endsection
