@extends('layouts.app', ['title' => 'Detail Post: ' . $post->title])

@section('content')

<div class="container">
    <h3>{{ $post->title }}</h3>
    <h5 class="text-secondary">Post published on: {{ $post->created_at->format('d F Y') }}</h5>
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
