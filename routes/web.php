<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Auth::routes();

// Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group( function(){
    Route::post('local-post', 'UsersController@localGov')->name('local');
    Route::post('state-post', 'UsersController@States')->name('states');

    Route::get('dashboard', 'UsersController@dashboard')->name('dashboard');
    
    Route::resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::get('users/admin-users', 'UsersController@adminUsers')->name('admins');
    Route::resource('users/zone', 'ZoneController', ['except' => ['show', 'create', 'store']]);
    Route::get('zone/managers', 'ZoneController@zonerManagers')->name('managers');
});

Route::namespace('User')->prefix('user')->name('user.')->group( function(){
    Route::resource('profile', 'ProfileController');
});