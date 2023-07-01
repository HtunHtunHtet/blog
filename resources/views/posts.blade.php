@extends('layout')

@section('content')
    @foreach ($posts as $post)
        <article class="{{ $loop->even ? 'margin-bottom': '' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}

                </a>
            </h1>

            <div>{{ $post->excerpt }}</div>
        </article>
    @endforeach
@endsection
