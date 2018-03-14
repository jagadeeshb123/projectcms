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

Route::auth();

Route::get('/','PostsController@index');

Route::get('/posts/{id}', 'PostsController@show');


Route::group(['middleware'=>'subscriber'], function () {

    Route::get('/home', 'HomeController@index');

    Route::post('/comments/{id}', 'PostCommentController@store');

});


Route::group(['middleware'=>'author'], function () {

    Route::get('/posts/create', 'PostsController@create');

    Route::post('/posts', 'PostsController@store');
});


Route::group(['middleware'=>'admin'], function () {

    Route::get('admin/posts', 'AdminPostsController@index');

    Route::get('admin/posts/{id}', 'AdminPostsController@edit');

    Route::post('/admin/posts/{post}/update', 'AdminPostsController@update');

    Route::get('/admin/posts/{post}/delete', 'AdminPostsController@destroy');


    Route::get('admin/users', 'AdminUsersController@index');

    Route::resource('admin/users/create', 'AdminUsersController@create');

    Route::post('admin/users', 'AdminUsersController@store');

    Route::get('admin/users/{id}', 'AdminUsersController@edit');

    Route::post('/admin/users/{user}/update', 'AdminUsersController@update');

    Route::get('/admin/users/{user}/delete', 'AdminUsersController@destroy');


    Route::get('/admin/comments', 'AdminCommentsController@index');

    Route::post('/admin/comments/{id}', 'AdminCommentsController@edit');

    Route::get('/admin/comments/{id}/delete', 'AdminCommentsController@destroy');


    Route::get('/admin/categories', 'AdminCategoriesController@index');

    Route::post('/admin/categories', 'AdminCategoriesController@store');

    Route::get('/admin/categories/{id}', 'AdmincategoriesController@edit');

    Route::post('/admin/categories/{category}/update', 'AdmincategoriesController@update');

    Route::get('/admin/categories/{category}/delete', 'AdminCategoriesController@destroy');

});
