<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alimento;
class AlimentoController extends Controller
{
    public function index ()
    {
    	$alimentos = Alimento::all();
    	return view("admin.alimentos.index", compact("alimentos"));
    }
    public function adicionar ()
    {
    	return view("admin.alimentos.adicionar");
    }
    public function atualizar ($id)
    {
    	$alimento = Alimento::consultar($id);
    	return view("admin.alimentos.atualizar", compact("alimento"));
    }
    public function cadastrar (Request $req)
    {
    	try {
    		$alimento = new Alimento();
    		$alimento->cadastrar($req->all());
            return json_encode(['error' => false, 'message' => "Cadastrado com sucesso", 'code' => 1]);
    	}catch(\Exception $e) {
            return json_encode(['error' => true, 'message' => "Cadastro sem sucesso", 'code' => 0]);
    	}
    }

    public function editar (Request $req)
    {
    	try {
    		$requisicao = $req->all();
    		$alimento = Alimento::find($requisicao["id"]);
    		$alimento->editar($requisicao);
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
        $img = "/img/alimentos/background-alimentos.jpg";
        $destaques = Alimento::exibirDestaqueMes();
        $todos = Alimento::exibirTodos(); 
        return view("pages.alimentos", compact("destaques", "todos"));
    }

}
