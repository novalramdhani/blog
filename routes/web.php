<?php

use Illuminate\Support\Facades\{Auth, Route};

Route::get('/', 'HomeController@index')
        ->middleware(['auth'])
        ->name('home');

Route::get('/about', 'HomeController@about')
        ->middleware(['auth'])
        ->name('about');

Route::get('/contact', 'HomeController@contact')
        ->middleware(['auth'])
        ->name('contact');

Route::get('/search', 'SearchController@post')
        ->name('search');

Route::get('/posts', 'PostController@index')
        ->name('posts.index');

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

Route::get('/posts/{post:slug}', 'PostController@show')
        ->name('posts.show');

Route::get('/categories/{category:slug}', 'CategoryController@index')
        ->name('category.detail');

Auth::routes();
