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
                <a href="" class="btn btn-link btn-sm text-success p-0">Edit Post</a>
            </div>
        </div>
    </div>
</div>

@endsection
