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



Route::get('/', 'HomeController@index');
Route::get('/articles/{id}/comment', 'ArticlesController@show');
Route::post('/articles/{id}/comment', 'ArticlesController@store_comment')->name('articles.store_comment');
Route::resource('/articles', 'ArticlesController');
Route::get('/posts/{post_name}', 'PostsController@show');
Route::post('/posts/{post_name}','CommentController@store');
Route::get('/contact', 'ContactController@create');
Route::post('/contact','ContactController@store');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

