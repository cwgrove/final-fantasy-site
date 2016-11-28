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

//Route::get('/', function () {
  //  return view('welcome');
//});

//Displays all posts
Route::get('/', 'CharacterController@index');

//Displays all heroes
Route::get('/heroes', 'CharacterController@hero');

//Displays all villains
Route::get('/villains', 'CharacterController@villain');

//Displays all summons
Route::get('/summons', 'CharacterController@summon');

//Takes user to admin pannel
Route::get('/share', 'CharacterController@admin');

//Shows individual post
Route::get('/{id}', 'CharacterController@show');

//Add post form
Route::get('/share/add', 'CharacterController@create');

//Displays videos
Route::get('/share/video', 'VideoController@create');

//Displays videos
Route::post('/share/video', 'VideoController@generate');

//Store post
Route::post('/share/add', 'CharacterController@store');

//Shows edit post form`
Route::get('/share/edit/{id}', 'CharacterController@edit');

// Updates post form
Route::post('/share/edit/{id}', 'CharacterController@update');

// Sends email
Route::post('/send', 'EmailController@send');

//***will Displays all posts owned by user
Route::get('/share/posts', 'CharacterController@allposts');

//Will archive post

Route::get('/share/edit/{id}/delete', 'CharacterController@archive');
