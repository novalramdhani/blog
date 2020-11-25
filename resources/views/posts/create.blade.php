@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-secondary">Create New Post</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-3">
                <div class="card-body">
                   <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-form-component :post="$post" :categories="$categories" :tags="$tags" submit="Add new post"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
