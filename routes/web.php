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


Route::get('/', ['as' => 'site.home', 'uses' => 'Site\LoginController@index']);

Route::get('/login', ['as' => 'login', 'uses' => 'Site\LoginController@index']);

Route::get('/login/sair', ['as' => 'site.login.sair', 'uses' => 'Site\LoginController@sair']);

Route::get('/registro', ['as' => 'registro', 'uses' => 'Site\LoginController@registro']);

Route::post('/registrar', ['as' => 'registrar', 'uses' => 'Site\LoginController@registrarLogin']);

Route::get('/feed', ['as' => 'site.feed', 'uses' => 'Site\DicaController@index']);

Route::post('/login/entrar', ['as' => 'site.login.entrar', 'uses' => 'Site\LoginController@entrar']);


/* Administrativo */
Route::get('/cms/login', ['as' => 'cms.login', 'uses' => 'Site\LoginController@index']);
Route::get('/cms/home', ['as' => 'cms.home', 'uses' => 'Site\AdminController@home']);

/* Fim Administrativo */
Route::get('/contato/{id?}', ['uses' => 'ContatoController@index']);

Route::post('/contato', ['uses' => 'ContatoController@criar']);

Route::put('/contato', ['uses' => 'ContatoController@editar']);

Route::group(['middleware' => "auth"], function () {
	Route::get('/admin/cursos', ['as' => 'admin.cursos', 'uses' => 'Admin\CursoController@index']);

	Route::get('/admin/cursos/adicionar', ['as' => 'admin.cursos.adicionar', 'uses' => 'Admin\CursoController@adicionar']);

	Route::post('/admin/cursos/salvar', ['as' => 'admin.cursos.salvar', 'uses' => 'Admin\CursoController@salvar']);

	Route::get('/admin/cursos/editar/{id}', ['as' => 'admin.cursos.editar', 'uses' => 'Admin\CursoController@editar']);

	Route::put('/admin/cursos/atualizar/{id}', ['as' => 'admin.cursos.atualizar', 'uses' => 'Admin\CursoController@atualizar']);

	Route::get('/admin/cursos/deletar/{id}', ['as' => 'admin.cursos.deletar', 'uses' => 'Admin\CursoController@deletar']);

});
