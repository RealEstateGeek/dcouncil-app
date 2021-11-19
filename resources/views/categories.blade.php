@extends('components/layout')

@section('content')
    <h1>
        Blog Categories
    </h1>
    @foreach ($categories as $category)
        <article>
            <a href="category/{{ $category->slug }}"> {{ $category->name }}</a>
        </article>
    @endforeach
@endsection
