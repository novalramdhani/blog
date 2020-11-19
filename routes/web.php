<?php

use Illuminate\Support\Facades\{Auth, Route};

Route::get('/', 'HomeController@index')
        ->middleware(['auth'])
        ->name('home');

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/create', 'PostController@create')
            ->name('create');

    Route::post('/store', 'PostController@store')
            ->name('store');

    Route::get('/edit/{post:slug}', 'PostController@edit')
            ->name('edit');

    Route::patch('/edit/{post:slug}', 'PostController@update')
            ->name('update');

    Route::delete('/delete/{post:slug}', 'PostController@destroy')
            ->name('delete');
});

Route::get('/posts', 'PostController@index')
        ->name('posts.index');

Route::get('/posts/{post:slug}', 'PostController@show')
        ->name('posts.show');

Auth::routes();
