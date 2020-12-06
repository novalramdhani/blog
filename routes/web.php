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

Route::middleware('auth')->prefix('posts')->name('posts.')->group(function () {
    Route::get('/create', 'PostController@create')
            ->name('create');

    Route::post('/store', 'PostController@store')
            ->name('store');

    Route::get('/{post:slug}/edit', 'PostController@edit')
            ->name('edit');

    Route::patch('/{post:slug}/edit', 'PostController@update')
            ->name('update');

    Route::delete('/{post:slug}/delete', 'PostController@destroy')
            ->name('delete');
});

Route::prefix('account')->middleware('auth')->name('account.')->group(function () {
    Route::get('/profile', 'Account\AccountController@detail')
            ->name('detail');

    Route::get('/edit/profile', 'Account\AccountController@edit')
            ->name('edit');

    Route::patch('/edit/profile', 'Account\AccountController@updateProfile')
            ->name('edit');

    Route::get('/change-password', 'Account\ChangePasswordAccountController@edit')
            ->name('change-password');

    Route::patch('/change-password', 'Account\ChangePasswordAccountController@changePassword')
            ->name('change-password');
});

Route::get('/posts/{post:slug}', 'PostController@show')
        ->name('posts.show');

Route::get('/categories/{category:slug}', 'CategoryController@index')
        ->name('category.detail');

Route::get('/tags/{tag:slug}', 'TagController@index')
        ->name('tags.index');
Auth::routes(['verified' => true]);