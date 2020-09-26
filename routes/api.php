<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', 'AuthAPIController@register');
Route::post('login', 'AuthAPIController@login');
Route::get('register', function () {
    return 'hhh';
});

Route::resource('categories', 'CategoryAPIController');

Route::resource('artists', 'ArtistAPIController');

Route::resource('galleries', 'GalleryAPIController');

Route::resource('notifications', 'NotificationAPIController');

Route::resource('request_artists', 'RequestArtistAPIController');

Route::resource('artist_proposes', 'ArtistProposeAPIController');

Route::resource('images', 'ImagesAPIController');
//Route::get('images', 'ImagesAPIController');
//Route::get('images/{id}', 'ImagesAPIController');


Route::view('request', 'requestArtists.create');
Route::get('rand', function () {
    return $message = 'your Validator number is: ' . random_int(232, 9999);
});
