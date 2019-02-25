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


Route::post('/save', 'Save\SaveController@save');
Route::post('/delete/{id}', 'Save\SaveController@delete');
Route::post('/add', 'Save\SaveController@addPublication');
Route::get('/search', 'Save\SaveController@Search');
Auth::routes();

Route::get('/publication', 'User\userController@getPublication');
Route::get('/information', 'User\userController@getInformation');
Route::get('photo/{post_id}', 'User\userController@getPhoto');
Route::get('user/{user_id}', 'User\userController@getUser');

Route::get('home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@welcome');



