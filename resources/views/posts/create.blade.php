@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-secondary">Create New Post</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-3">
                <div class="card-body">
                   <form action="{{ route('posts.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea name="content" id="content" cols="30" rows="5" class="form-control @error('content') is-invalid @enderror"></textarea>
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
