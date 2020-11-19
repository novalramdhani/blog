@extends('layouts.app', ['title' => 'All Posts Page'])

@section('content')

<div class="container">
    <div class="d-flex justify-content-between">
        <h2>All Posts</h2>
        <div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
        </div>
    </div>
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4 mt-3">
                <div class="card mb-3">
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
            <div class="alert alert-danger">
                There no posts.
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>

@endsection
