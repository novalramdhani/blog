<?php

use Illuminate\Support\Facades\{Auth, Route};



Route::get('/', 'HomeController@index')
        ->middleware(['auth'])
        ->name('home');

Route::get('/posts', 'PostController@index')
        ->name('posts.index');

Route::get('/posts/{post:slug}', 'PostController@show')
        ->name('posts.show');

Auth::routes();
