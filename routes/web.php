<?php

use Illuminate\Support\Facades\{Auth, Route};



Route::get('/', 'HomeController@index')
        ->middleware(['auth'])
        ->name('home');

Route::get('/posts', 'PostController@index')
        ->name('posts.index');

Auth::routes();
