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
Route::resource('governments', 'GovernmentController');
Route::resource('cities', 'CityController');
Route::resource('categories', 'categoryController');
Route::resource('orders', 'OrderController');
Route::resource('posts', 'PostController');
Route::resource('settings', 'SettingsController');
Route::resource('clients', 'ClientController');





Route::get('logout','HomeController@doLogout');



