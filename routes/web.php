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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/angular/modules/{pathToFile}','ViewsController@module');
Route::get('/angular/blocks/{pathToFile}','ViewsController@block');
Route::get('/api/user','Api\UserController@getLogued')->middleware('auth');



