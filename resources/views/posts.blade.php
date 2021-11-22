@extends('components/layout')

@section('content')
    @foreach ($posts as $post)
        <article>
            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            <br/>
            By: <a href="/users/{{ $post->user->id }}" >{{ $post->user->name }} </a>
            <br/>
            In category: <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a>
            <br/>
            {{ $post->excerpt }}
        </article>
    @endforeach
@endsection
