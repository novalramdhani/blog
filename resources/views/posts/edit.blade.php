@extends('layouts.app', ['title' => 'Edit Post: ' . ' ' . $post->title])

@section('content')

<div class="container">
    <h2 class="text-secondary">Edit Post: {{ $post->title }}</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-3">
                <div class="card-body">
                   <form action="{{ route('posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <x-form-component :post="$post" :categories="$categories" :tags="$tags" submit="Edit post"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
