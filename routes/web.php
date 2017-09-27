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
    return view('auth.login');
});

Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/albums', 'HomeController@userAlbums')->name('user.albums');
Route::get('/user/artists', 'HomeController@userArtists')->name('user.artists');
Route::get('/user/tracks', 'HomeController@userTracks')->name('user.tracks');
Route::get('/search/track', 'HomeController@searchTrack')->name('search.track');
Route::get('/search/album', 'HomeController@searchAlbum')->name('search.album');
Route::get('/search/artist', 'HomeController@searchArtist')->name('search.artist');



