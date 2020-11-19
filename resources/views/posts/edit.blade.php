@extends('layouts.app', ['title' => 'Edit Post: ' . ' ' . $post->title])

@section('content')

<div class="container">
    <h2 class="text-secondary">Edit Post: {{ $post->title }}</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-3">
                <div class="card-body">
                   <form action="{{ route('posts.update', $post->slug) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $post->title }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea name="content" id="content" cols="30" rows="5" class="form-control @error('content') is-invalid @enderror">{{ old('content') ?? $post->content }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add New Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
