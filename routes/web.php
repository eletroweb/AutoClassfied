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

Auth::routes();
Route::get('/ajax/veiculos/marcas', 'VeiculoController@getMarcas');
Route::get('/ajax/veiculos/modelos', 'VeiculoController@getModelos');
Route::get('/ajax/veiculos/versoes', 'VeiculoController@getVersoes');
Route::get('/anuncios', 'AnuncioController@anuncios')->name('anuncios');
Route::get('/anuncios/{titulo}_{id}', 'AnuncioController@index')->where('id', '[0-9]+');
Route::get('/fale-conosco', 'ContatoController@index')->name('fale_conosco');
Route::post('/fale-conosco', 'ContatoController@store')->name('fale_conosco_post');
Route::get('/como-comprar-carro', 'UserController@duvida_comprar_carro')->name('duvida_comprar_carro');
Route::get('/como-vender-carro', 'UserController@duvida_vender_carro')->name('duvida_vender_carro');
Route::get('/duvidas-anuncios', 'UserController@duvida_anuncios')->name('duvida_anuncios');
Route::get('/', 'HomeController@index');
Route::get('/cronjob/update/all', 'VeiculoController@importMarcaModelos');
Route::post('/anuncio/contato', 'ContatoAnuncioController@store')->name('contato_anuncio');
Route::get('/revenda/{id}', 'RevendaController@homepage');
Route::get('/consulta-tabela-fipe', 'FipeController@index')->name('fipe');
Route::get('/encontre-uma-revenda', 'RevendaController@revendas')->name('revendas');
Route::get('/revenda/rel/chartjs', 'RevendaController@viewsByMonth')->name('rel_chart_mes');

Route::middleware('auth')->group(function () {
  Route::post('/pagseguro/startSession', 'PagseguroController@startSession')->name('start_session');
  Route::get('/anuncie', 'AnuncioController@anuncie')->name('anuncie');
  Route::get('/minha-conta', 'UserController@profile')->name('minhaconta');
  Route::get('/minha-conta/meus-anuncios', 'UserController@meus_anuncios')->name('meusanuncios');
  Route::post('/anuncios/store', 'AnuncioController@anuncieStore')->name('anuncieStore');
  Route::post('/imagens/store', 'ImagemController@imageUpload');
  Route::get('/revenda/{id}/configuracoes', 'RevendaController@config');
  Route::post('/revenda/{id}/update', 'RevendaController@update')->name('update_revenda');
  Route::post('/cadastrar-endereco', 'UserController@cadastrarEndereco');
});

Route::get('/importxml', 'VeiculoController@updateVeiculos');
Route::middleware(['auth','admin'])->group(function(){
  Route::get('/contratar-revenda', 'RevendaController@sejarevendedor')->name('contratar_revenda');
  Route::post('/revendas/store', 'RevendaController@store')->name('store_revenda');
  Route::get('/admin/revenda', 'RevendaController@admin');
  Route::post('/admin/revenda/import', 'RevendaController@importRevendas');
  Route::get('/admin', 'UserController@admin')->name('admin');
  Route::get('/admin/tables', 'UserController@tables');
  Route::get('/admin/form', 'UserController@form');
  Route::get('/admin/configuracoes', 'ConfigController@index')->name('configuracoes');
  Route::resource('/admin/marcas', 'MarcaController');
  Route::resource('/admin/modelos', 'ModelosController');
  Route::resource('/admin/versoes', 'VersaoController');
  Route::resource('/admin/anuncioFields', 'AnuncioFieldController');
  Route::resource('/admin/planos', 'PlanoController');
  Route::resource('/admin/users', 'UserController');
  Route::resource('/admin/revendas', 'RevendaController');
  Route::resource('/admin/newsletterUsers', 'NewsletterUserController');
  Route::resource('/admin/transactions', 'TransactionController');
  Route::resource('/admin/transactionItems', 'TransactionItemController');
});
