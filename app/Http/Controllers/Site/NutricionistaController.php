<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nutricionista;
class NutricionistaController extends Controller
{
    public function index ()
    {
    	$nutricionistas = Nutricionista::all();
    	return view("admin.nutricionistas.index", compact("nutricionistas"));
    }
    public function adicionar ()
    {
    	return view("admin.nutricionistas.adicionar");
    }
    public function atualizar ($id)
    {
    	$nutricionista = Nutricionista::consultar($id);
    	return view("admin.nutricionistas.atualizar", compact("nutricionista"));
    }
    public function cadastrar (Request $req)
    {
    	try {
    		$nutricionista = new Nutricionista();
    		$nutricionista->cadastrar($req->all());
            return json_encode(['error' => false, 'message' => "Cadastrado com sucesso", 'code' => 1]);
    	}catch(\Exception $e) {
            return json_encode(['error' => true, 'message' => "Cadastro sem sucesso", 'code' => 0]);
    	}
    }

    public function editar (Request $req)
    {
    	try {
    		$requisicao = $req->all();
    		$nutricionista = Nutricionista::find($requisicao["id"]);
    		$nutricionista->editar($requisicao);
            return json_encode(['error' => false, 'message' => "Atualização com sucesso", 'code' => 1]);
    	}catch(\Exception $e) {
            return json_encode(['error' => true, 'message' => "Atualização sem sucesso", 'code' => 0]);
    	}
    }
    
    public function excluir (Request $req)
    {
    	try {
    		$requisicao = $req->all();
    		$nutricionista = Nutricionista::find($requisicao["id"]);
    		$nutricionista->excluir();
            return json_encode(['error' => false, 'message' => "Exclusão com sucesso", 'code' => 1]);
    	}catch(\Exception $e) {
            return json_encode(['error' => true, 'message' => "Exclusão sem sucesso", 'code' => 0]);
    	}
    }

    // public function alimentos ()
    // {
    //     $destaques = Alimento::exibirDestaqueMes();
    //     $todos = Alimento::exibirTodos(); 
    //     return view("pages.alimentos", compact("destaques", "todos"));
    // }
}
