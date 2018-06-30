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
//Apenas para testes
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::get('/anuncios', 'AnuncioController@anuncios')->name('anuncios');
Route::get('/anuncios/{id}', 'AnuncioController@index')->where('id', '[0-9]+');

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function () {
  Route::get('/anuncie', 'AnuncioController@anuncie')->name('anuncie');
  Route::get('/minha-conta', 'UserController@profile')->name('minhaconta');
  Route::get('/minha-conta/meus-anuncios', 'UserController@meus_anuncios')->name('meusanuncios');
  Route::post('/anuncios/store', 'AnuncioController@anuncieStore')->name('anuncieStore');
});
