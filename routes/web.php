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
Route::get('/ajax/veiculos/marcas', 'VeiculoController@getMarcas');
Route::get('/ajax/veiculos/modelos', 'VeiculoController@getModelos');
Route::get('/ajax/veiculos/versoes', 'VeiculoController@getVersoes');
Route::get('/anuncios', 'AnuncioController@anuncios')->name('anuncios');
Route::get('/anuncios/{id}', 'AnuncioController@index')->where('id', '[0-9]+');
Route::get('/fale-conosco', 'ContatoController@index')->name('fale_conosco');
Route::post('/fale-conosco', 'ContatoController@store')->name('fale_conosco_post');
Route::get('/como-comprar-carro', 'UserController@duvida_comprar_carro')->name('duvida_comprar_carro');
Route::get('/como-vender-carro', 'UserController@duvida_vender_carro')->name('duvida_vender_carro');
Route::get('/duvidas-anuncios', 'UserController@duvida_anuncios')->name('duvida_anuncios');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cronjob/update/all', 'VeiculoController@importMarcaModelos');
Route::post('/anuncio/contato', 'ContatoAnuncioController@store')->name('contato_anuncio');
Route::middleware('auth')->group(function () {
  Route::get('/anuncie', 'AnuncioController@anuncie')->name('anuncie');
  Route::get('/minha-conta', 'UserController@profile')->name('minhaconta');
  Route::get('/minha-conta/meus-anuncios', 'UserController@meus_anuncios')->name('meusanuncios');
  Route::post('/anuncios/store', 'AnuncioController@anuncieStore')->name('anuncieStore');
});
Route::get('/importxml', 'VeiculoController@updateVeiculos');
Route::middleware(['auth','admin'])->group(function(){
  Route::get('/admin', 'UserController@admin')->name('admin');
  Route::get('/admin/tables', 'UserController@tables');
  Route::get('/admin/form', 'UserController@form');
  Route::resource('/admin/marcas', 'MarcaController');
  Route::resource('/admin/modelos', 'ModelosController');
  Route::resource('/admin/versoes', 'VersaoController');
  Route::resource('/admin/anuncioFields', 'AnuncioFieldController');
});
