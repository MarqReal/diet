<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alimento;
use App\Dieta;
class DietaController extends Controller
{
    public function index ()
    {
    	$dietas = Dieta::all();
    	return view("admin.dietas.index", compact("dietas"));
    }
    public function adicionar ()
    {
    	$alimentos = Alimento::exibirTodos();
    	return view("admin.dietas.adicionar", compact("alimentos"));
    }
    public function atualizar ($id)
    {
    	$alimentos = Alimento::exibirTodos();
    	$dieta = Dieta::consultar($id);
    	return view("admin.dietas.atualizar", compact("dieta", "alimentos"));
    }
    public function cadastrar (Request $req)
    {
    	try {
    		$dieta = new Dieta();
    		$dieta->cadastrar($req->all());
            return json_encode(['error' => false, 'message' => "Cadastrado com sucesso", 'code' => 1]);
    	}catch(\Exception $e) {
            return json_encode(['error' => true, 'message' => "Cadastro sem sucesso", 'code' => 0]);
    	}
    }

    public function editar (Request $req)
    {
    	try {
    		$requisicao = $req->all();
    		$dieta = Dieta::find($requisicao["id"]);
    		$dieta->editar($requisicao);
            return json_encode(['error' => false, 'message' => "Atualização com sucesso", 'code' => 1]);
    	}catch(\Exception $e) {
            return json_encode(['error' => true, 'message' => "Atualização sem sucesso", 'code' => 0]);
    	}
    }
    
    public function excluir (Request $req)
    {
    	try {
    		$requisicao = $req->all();
    		$alimento = Alimento::find($requisicao["id"]);
    		$alimento->excluir();
            return json_encode(['error' => false, 'message' => "Exclusão com sucesso", 'code' => 1]);
    	}catch(\Exception $e) {
            return json_encode(['error' => true, 'message' => "Exclusão sem sucesso", 'code' => 0]);
    	}
    }

    public function alimentos ()
    {
        $destaques = Alimento::exibirDestaqueMes();
        $todos = Alimento::exibirTodos(); 
        return view("pages.alimentos", compact("destaques", "todos"));
    }
}
