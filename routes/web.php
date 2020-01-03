<?php

use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'FrontPageController@welcome')->name('welcome');
Route::get('show/{slug}', 'FrontPageController@show')->name('show.post');
Route::get('post-by-category/{slug}', 'FrontPageController@PostByCategory')->name('postsbycategory');
Route::get('all-posts/', 'FrontPageController@allPosts')->name('allposts');
Route::get('privacy', 'FrontPageController@privacy')->name('privacy');

Auth::routes(['verify' => true]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->group( function(){
    Route::post('local-post', 'UsersController@localGov')->name('local');
    Route::post('state-post', 'UsersController@States')->name('states');
    Route::patch('status/update/{id}', 'UsersController@status')->name('status');

    Route::get('dashboard', 'UsersController@dashboard')->name('dashboard');
    
    Route::resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::get('users/admin-users', 'UsersController@adminUsers')->name('admins');
    Route::resource('users/zone', 'ZoneController', ['except' => ['show', 'create', 'store']]);
    Route::get('zone/managers', 'ZoneController@zonerManagers')->name('managers');

    Route::get('create/category', 'CategoryController@create')->name('create.category');
    Route::get('category', 'CategoryController@index')->name('index.category');
    Route::get('user/category', 'CategoryController@myCategory')->name('mycategory.category');
    Route::post('create/category', 'CategoryController@store')->name('store.category');

    Route::patch('update/status/{id}', 'CategoryController@status')->name('status.category');
});

Route::namespace('User')->prefix('user')->name('user.')->group( function(){
    Route::get('create/post', 'PostController@createPost')->name('create.post')->middleware('update-post');
    Route::post('create/post', 'PostController@store')->name('post.store');
    Route::get('edit/post/{slug}', 'PostController@edit')->name('post.edit');
    Route::put('edit/post/{slug}', 'PostController@update')->name('post.update');
    Route::get('posts', 'PostController@index')->name('post.index');
    Route::get('my-posts', 'PostController@myPosts')->name('post.myposts');
    Route::patch('posts-status/{id}', 'PostController@status')->name('post.status');
    Route::delete('posts-status/{id}', 'PostController@destroy')->name('post.delete');

    Route::get('post/comment/{id}', 'CommentController@create')->name('create.comment');
    Route::post('post/comment/{id}', 'CommentController@store')->name('store.comment');

    Route::resource('profile', 'ProfileController');
});