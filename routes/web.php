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

Route::post('/login/entrar', ['as' => 'site.login.entrar', 'uses' => 'Site\LoginController@entrar']);

Route::get('/login/sair', ['as' => 'site.login.sair', 'uses' => 'Site\LoginController@sair']);

Route::get('/registro', ['as' => 'registro', 'uses' => 'Site\LoginController@registro']);

Route::post('/registrar', ['as' => 'registrar', 'uses' => 'Site\LoginController@registrarLogin']);

Route::group(['middleware' => "auth"], function () {
	Route::get('/feed', ['as' => 'site.feed', 'uses' => 'Site\DicaController@index']);	
	Route::get('/dicas', ['as' => 'site.dicas', 'uses' => 'Site\DicaController@exibirDicas']);	
	Route::get('/alimentos', ['as' => 'site.alimentos', 'uses' => 'Site\AlimentoController@alimentos']);	
	
	/* DIETA PARA O USUARIO*/
	Route::get('/dietas', ['as' => 'site.dietas', 'uses' => 'Site\DietaController@dietas']);	
	Route::get('/dietas/adicionar', ['as' => 'site.dietas.participacao', 'uses' => 'Site\DietaController@participacao']);	
	Route::post('/dietas/participar', ['as' => 'site.dietas.participar', 'uses' => 'Site\LoginController@participarDieta']);
		Route::delete('/dietas/removerParticipacao', ['as' => 'site.dietas.remover.participacao', 'uses' => 'Site\LoginController@removerParticipacao']);
	Route::get('/dietas/consultar/{id}/{participacao}', ['as' => 'site.dietas.consultar', 'uses' => 'Site\DietaController@consultar']);	
	/* FIM DIETA PARA O USUARIO*/

	/*ALIMENTO*/
	Route::get('/alimento', ['as' => 'site.alimento', 'uses' => 'Site\AlimentoController@index']);	
	Route::get('/alimento/adicionar', ['as' => 'site.alimento.adicionar', 'uses' => 'Site\AlimentoController@adicionar']);
	Route::post('/alimento/cadastrar', ['as' => 'site.alimento.cadastrar', 'uses' => 'Site\AlimentoController@cadastrar']);
	Route::get('/alimento/atualizar/{id}', ['as' => 'site.alimento.atualizar', 'uses' => 'Site\AlimentoController@atualizar']);	
	Route::put('/alimento/editar', ['as' => 'site.alimento.editar', 'uses' => 'Site\AlimentoController@editar']);
	Route::delete('/alimento/excluir', ['as' => 'site.alimento.excluir', 'uses' => 'Site\AlimentoController@excluir']);
	/*FIM ALIMENTO*/

		/*NUTRICIONISTA*/
	//Route::get('/nutricionista', ['as' => 'site.nutricionista', 'uses' => 'Site\NutricionistaController@index']);	
	Route::get('/nutricionista/adicionar', ['as' => 'site.nutricionista.adicionar', 'uses' => 'Site\NutricionistaController@adicionar']);
	Route::post('/nutricionista/cadastrar', ['as' => 'site.nutricionista.cadastrar', 'uses' => 'Site\NutricionistaController@cadastrar']);
	Route::get('/nutricionista/atualizar/{id}', ['as' => 'site.nutricionista.atualizar', 'uses' => 'Site\NutricionistaController@atualizar']);	
	Route::put('/nutricionista/editar', ['as' => 'site.nutricionista.editar', 'uses' => 'Site\NutricionistaController@editar']);
	Route::delete('/nutricionista/excluir', ['as' => 'site.nutricionista.excluir', 'uses' => 'Site\NutricionistaController@excluir']);
	/*FIM NUTRICIONISTA*/

	
	/*DIETA*/
	//Route::get('/dieta', ['as' => 'site.dieta', 'uses' => 'Site\DietaController@index']);	
	Route::get('/dieta/adicionar', ['as' => 'site.dieta.adicionar', 'uses' => 'Site\DietaController@adicionar']);
	Route::post('/dieta/cadastrar', ['as' => 'site.dieta.cadastrar', 'uses' => 'Site\DietaController@cadastrar']);
	Route::get('/dieta/atualizar/{id}', ['as' => 'site.dieta.atualizar', 'uses' => 'Site\DietaController@atualizar']);	
	Route::put('/dieta/editar', ['as' => 'site.dieta.editar', 'uses' => 'Site\DietaController@editar']);
	Route::delete('/dieta/excluir', ['as' => 'site.dieta.excluir', 'uses' => 'Site\DietaController@excluir']);
	/*FIM DIETA*/
	
	Route::delete('login/excluir', ['as' => 'excluir', 'uses' => 'Site\LoginController@excluir']);
	Route::put('login/editar', ['as' => 'editar', 'uses' => 'Site\LoginController@editar']);

});

/* Administrativo */
Route::get('/cms/login', ['as' => 'cms.login', 'uses' => 'Site\AdminController@index']);
Route::group(['middleware' => "authAdmin"], function () {
	Route::get('/cms/home', ['as' => 'cms.home', 'uses' => 'Site\AdminController@home']);
	Route::get('/cms/alimentos', ['as' => 'cms.alimentos', 'uses' => 'Site\AlimentoController@index']);
	Route::get('/cms/nutricionistas', ['as' => 'cms.nutricionistas', 'uses' => 'Site\NutricionistaController@index']);
	Route::get('/cms/dietas', ['as' => 'cms.dietas', 'uses' => 'Site\DietaController@index']);		
});

/* Fim Administrativo */

Route::group(['middleware' => "auth"], function () {
	Route::get('/admin/cursos', ['as' => 'admin.cursos', 'uses' => 'Admin\CursoController@index']);

	Route::get('/admin/cursos/adicionar', ['as' => 'admin.cursos.adicionar', 'uses' => 'Admin\CursoController@adicionar']);

	Route::post('/admin/cursos/salvar', ['as' => 'admin.cursos.salvar', 'uses' => 'Admin\CursoController@salvar']);

	Route::get('/admin/cursos/editar/{id}', ['as' => 'admin.cursos.editar', 'uses' => 'Admin\CursoController@editar']);

	Route::put('/admin/cursos/atualizar/{id}', ['as' => 'admin.cursos.atualizar', 'uses' => 'Admin\CursoController@atualizar']);

	Route::get('/admin/cursos/deletar/{id}', ['as' => 'admin.cursos.deletar', 'uses' => 'Admin\CursoController@deletar']);

});
