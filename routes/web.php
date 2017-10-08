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


Route::get('/loginpage', 'LoginController@loginpage');
Route::get('/registerpage', 'LoginController@registerpage');
Route::get('/', 'HomepageController');
Route::get('/topic/{topic_id}', 'CommentsController');
Route::post('/login', 'LoginController@login');
Route::post('/register', 'LoginController@register');
Route::get('/signout', 'LoginController@signout');
Route::post('/postcomment', 'CommentsController@postComment');
Route::post('/deletecomment', 'CommentsController@deleteComment');
Route::post('/displayComments', 'CommentsController@displayComments');
