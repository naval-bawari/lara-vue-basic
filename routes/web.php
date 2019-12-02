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
Route::get('/list-post', 'PostController@list')->name('list-post');
Route::get('/mixins', 'MixinsController@index')->name('mixins');
Route::get('/event-bus', 'EventBusController@index')->name('event-bus');
Route::get('/vue-fire', 'EventBusController@vueFire')->name('vue-fire');
