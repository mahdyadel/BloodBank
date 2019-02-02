<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::group(['prefix' => 'v1','namespace' => 'api'],function(){

//register
Route::post('register' , 'AuthController@register');
//login
Route::post('login' , 'AuthController@login');




Route::group(['middleware' => 'auth:api'],function(){
//udateprofile
Route::post('profile' , 'AuthController@profile');
//reset password
Route::post('reset-password' , 'AuthController@reset');
//password
Route::post('new-password' ,'AuthController@password');
//favourite
Route::post('favorite-post' , 'MainController@favouritePost');
//myfavourite
Route::get('my-favourite' , 'MainController@myFavourite');
//governments
Route::get('governments' , 'MainController@governments');
//cities
Route::get('cities' , 'MainController@cities');
//posts
Route::get('posts' , 'MainController@posts');
//orders
Route::get('orders' , 'MainController@orders');
//notifications
Route::get('notifications' ,'MainController@notifications');
//settings
Route::get('settings','MainController@settings' );
//blood_types
Route::get('blood-types' , 'MainController@bloodTypse');
//donation requst create
Route::post('donatin-request-create' ,'MainController@DonatinRequestCreate' );
//donation requst 
Route::get('donation-request' , 'MainController@donationRequest');
//categories
Route::get('categories' , 'MainController@categories');
//favourites
Route::get('favourites' , 'MainController@favourites');
//contacts
Route::post('contacts' ,'MainController@contacts');



});



 });
