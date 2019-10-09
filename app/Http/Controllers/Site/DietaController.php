<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
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
    		$alimento = Dieta::find($requisicao["id"]);
    		$alimento->excluir();
            return json_encode(['error' => false, 'message' => "Exclusão com sucesso", 'code' => 1]);
    	}catch(\Exception $e) {
            return json_encode(['error' => true, 'message' => "Exclusão sem sucesso", 'code' => 0]);
    	}
    }

    public function graficos()
    {
        $dietas = Dieta::exibirBibliotecaDietas(Auth::user());
        return view('pages.graficos', compact('dietas'));
    }
    public function consultarGraficoProgressao(Request $request)
    {
        try {
                $data = Dieta::consultarGraficoProgressao($request->all());
            return json_encode(['error' => false, 'message' => "Consulta de peso com sucesso", 'code' => 1, 'dados' => $data]);
        }catch(\Exception $e) {
            return json_encode(['error' => true, 'message' => "Consulta de peso sem sucesso", 'code' => 0, 'dados' => null]);
        }
    }
    public function consultar ($id, $participacao)
    {
        $img = "/img/alimentos/background-alimentos.jpg";
        $dieta = Dieta::consultar($id);   
        return view("pages.dietas.consultar", compact("dieta", "img", "participacao", "id"));
    }

    public function dietas ()
    {
        $todos = Dieta::exibirBibliotecaDietas(Auth::user());
        $disabledAddDieta = (isset($todos[0]) && $todos[0]->pivot->ativo) ? "disabled" : ""; 
        
        //dd($todos[0]->pivot->dt_inicio);
        //dd($todos); 
        return view("pages.dietas.dietas", compact("todos", "disabledAddDieta"));
    }
    public function participacao ()
    {
        //$dieta = Dieta::find(11);
        //dd($dieta->cafeManha[0]->pivot->quantidade);
        $dietas = Dieta::where('objetivo', Auth::user()->relacao->situacao)->get(); 
        return view("pages.dietas.participacao", compact("dietas"));
    }
}
