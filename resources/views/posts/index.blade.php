@extends('layouts.app', ['title' => 'All Posts Page'])

@section('content')

<div class="container">

    <x-search-component text="Search a post" button-type="btn btn-info" font-awesome="fas fa-search" />

    <div class="d-flex justify-content-between">
        @if(isset($category))
            <h2>Category: {{ $category->name }}</h2>
        @elseif(isset($tag))
        <h2>Tag: {{ $tag->name }}</h2>
            @else
            <h2>All Posts</h2>
        @endif
        <div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
        </div>
    </div>
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4 mt-3">
                <div class="card mb-3">
                    @if($post->thumbnail)
                        <img src="{{ asset($post->takeImage) }}" class="img-thumbnail">
                    @endif
                    <div class="card-body">
                        <p class="card-title text-secondary">{{ $post->title }}</p>
                        <hr>
                        {{ \Str::limit($post->content, 140, '...') }}

                        <div>
                            <a href="{{ route('posts.show', $post->slug) }}" class="text-info">Detail Post</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ 'Post publised on:' . ' ' . $post->created_at->format('d F Y') }}
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-6 mt-3">
                <div class="alert alert-danger">
                    There no posts.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>

@endsection
