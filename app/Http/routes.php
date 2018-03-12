<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::group(['middleware'=>'admin'], function () {

    Route::get('admin/users', 'AdminUsersController@index');

    Route::resource('admin/users/create', 'AdminUsersController@create');

    Route::post('admin/users', 'AdminUsersController@store');

    Route::get('admin/users/{id}', 'AdminUsersController@edit');

    Route::post('/admin/users/{user}/update', 'AdminUsersController@update');

    Route::get('/admin/users/{user}/delete', 'AdminUsersController@destroy');


    Route::get('admin/posts', 'AdminPostsController@index');

    Route::get('admin/posts/create', 'AdminPostsController@create');

    Route::post('admin/posts', 'AdminPostsController@store');
});



