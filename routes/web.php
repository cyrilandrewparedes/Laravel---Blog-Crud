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

Route::get('/', 'AppController@welcome')->name('welcome');

Auth::routes();

Route::get('/admin', 'AppController@admin')->name('admin');
Route::post('/checkLogin', 'AppController@checkLogin')->name('checkLogin');
Route::get('/home', 'AppController@home')->name('home');
Route::get('/addPostPage', 'AppController@addPostPage')->name('addPostPage');
Route::get('/editPostPage/{id}', 'AppController@editPostPage')->name('editPostPage');
Route::post('/addPost', 'AppController@addPost')->name('addPost');
Route::post('/editPost', 'AppController@editPost')->name('editPost');
Route::get('/deletePost/{id}', 'AppController@deletePost')->name('deletePost');