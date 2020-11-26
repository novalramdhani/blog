@extends('layouts.app', ['title' => 'Account Profile:' . ' ' . auth()->user()->username])

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3 class="text-secondary">Your Account Profile</h3></div>
                    @if (auth()->user()->thumbnail)
                        <img src="{{ asset('/storage/' . auth()->user()->thumbnail) }}" class="img-thumbnail" height="300px" width="300px">
                    @endif
                    <div class="card-body">
                        <p class="card-title h5">Your name: {{ auth()->user()->name }}</p>
                        <p class="card-title text-info">Your username: {{ auth()->user()->username }}</p>
                        <p class="card-title">Your email: {{ auth()->user()->email }}</p>
                        <p class="text-success">Registered account: {{ auth()->user()->created_at->format('d F Y') }}</p>
                        <p class="card-info">Email verified: {{ auth()->user()->email_verified_at->format('d F Y') }}</p>
                    </div>
                    <div class="card-footer">
                        <div>
                            <a href="" class="btn btn-link btn-sm text-danger p-0">Delete Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
