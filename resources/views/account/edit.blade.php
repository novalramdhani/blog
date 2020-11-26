@extends('layouts.app', ['title' => 'Edit Profile:' . ' ' . auth()->user()->username])

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h3>Edit Profile</h3></div>
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('account.edit') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <div class="d-flex justify-content-center mb-3">
                                <img src="{{ asset('/storage/' . auth()->user()->thumbnail) }}" alt="">
                            </div>
                            <label for="thumbnail">Your image:</label>
                            <div>
                                <input type="file" name="thumbnail" id="thumbnail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') ?? auth()->user()->username }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') ?? auth()->user()->email }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit your profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
