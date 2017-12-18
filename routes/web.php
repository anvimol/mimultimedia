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

Route::get('/', 'TestController@index');
Route::get('/series', 'TestController@series')->name('series');
Route::get('/peliculas', 'TestController@peliculas')->name('peliculas');
Route::get('/musicas', 'TestController@musicas')->name('musicas');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::resource('disk', 'DiskController');
Route::resource('serie', 'SerieController');
Route::resource('pelicula', 'PeliculaController');
Route::resource('musica', 'MusicController');

