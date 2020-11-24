@extends('layouts.app', ['title' => 'Detail Post: ' . $post->title])

@section('content')

<div class="container">
    <h3>{{ $post->title }}</h3>
    <small><p class="text-secondary">Post published on: {{ $post->created_at->format('d F Y') }}</p></small>
    <div>
        <a href="{{ route('category.detail', $post->category->slug) }}">{{ $post->category->name }}</a>
        <div>
            @foreach ($post->tags as $tag)
                <a href="{{ route('tags.index', $tag->slug) }}">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <p>{{ $post->content }}</p>

            <div class="d-flex justify-content-between">
                <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-link btn-sm text-success p-0">Edit Post</a>

                <form action="{{ route('posts.delete', $post->slug) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-link btn-sm text-danger p-0">Delete Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
