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
                        <div class="form-group">
                            <label for="thumbnail">Choose your thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail">
                        </div>
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
                            <label for="category">Category:</label>
                            <select name="category" id="category" class="form-control @error('category')
                            is-invalid @enderror">
                            <option disabled selected>Choose one!</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags">Tags:</label>
                            <select multiple="multiple" class="form-control select2" name="tags[]" id="tags">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
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
