<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Nutricionista;
use App\Dieta;
class LoginController extends Controller
{
    public function index() 
    {
        $img = "/img/login/alimentos-background.jpg";
    	return view("login.index", compact("img"));
    }
    
    public function entrar(Request $req) 
    {
    	$dados = $req->all();
    	if(Auth::attempt(['email' => $dados['email'], 'password' => $dados["senha"]])) {
            $usuario = User::where("email", $dados['email'])->first();

            if (Auth::user()->relacao_type == "App\Participante") {
                $todos = Dieta::exibirBibliotecaDietas(Auth::user());
                $hasDietActivated = ($todos->count() > 0 && $todos[0]->pivot->ativo) ? true : false;
                if ($hasDietActivated) {
                    $diff = date_diff(date_create(date("Y-m-d")), date_create($todos[0]->pivot->dt_termino));
                    $diferencaDias =  $diff->format("%a%");
                }
                if ($hasDietActivated && $diferencaDias >= 0) {
                    $keys = [
                        "dieta_id" => $todos[0]->pivot->dieta_id,
                        "user_id" => $todos[0]->pivot->user_id,
                        "quantidade_participacao" => $todos[0]->pivot->quantidade_participacao
                    ];
                    Auth::user()->dietas()->updateExistingPivot($keys, ["ativo" => 0]);
                }
            } 
            return json_encode(['error' => false, 'message' => "Login com sucesso", "code" => 1, "typeUser" => $usuario->relacao_type]);
    	} else {
            return json_encode(['error' => true, 'message' => "Login sem sucesso", 'code' => 0]);
        }
    }
    public function sair() 
    {   
        try {
            Auth::logout();
            return json_encode(['error' => false, 'message' => "Logout com sucesso", 'code' => 0]);
        } catch(\Exception $e) {
            return json_encode(['error' => true, 'message' => "Logout sem sucesso", 'code' => 0]);
        }
        //return redirect()->route("site.home");  
    }
    
    public function registro() 
    {
        $nutricionistas = Nutricionista::exibirTodos();
        $participante_nutricionista = [];
        if (Auth::user()) {
            foreach (Auth::user()->relacao->nutricionistas()->get() as $key => $nutricionista) {
                $participante_nutricionista[$nutricionista->id] = $nutricionista->nome;
            }
        }
        return view("registro.index", compact('nutricionistas', 'participante_nutricionista'));
    }

    public function registrarLogin(Request $req) 
    {   
        try { 
            
            $requisicao = $req->all();
            $user = new User();
            $user->registrarLogin($requisicao);
            return json_encode(['error' => false, 'message' => "Cadastrado com sucesso", "code" => 1]);

        } catch(\Exception $e) {
            return json_encode(['error' => true, 'message' =>    $e->getMessage(), 'code' => $e->getCode()]);
        }
    }

    public function editar (Request $req)
    {
        try {
            $requisicao = $req->all();    
            $usuario = Auth::user();
            $usuario->editar($requisicao);
            return json_encode(['error' => false, 'message' => "Edição com sucesso", "code" => 1]);
        } catch(\Exception $e) {
            return json_encode(['error' => true, 'message' =>    $e->getMessage(), 'code' => $e->getCode()]);
        }        
    }
    public function excluir() 
    {   
        try {    
            $usuario = Auth::user();
            $usuario->excluir();
            return json_encode(['error' => false, 'message' => "Remoção com sucesso", "code" => 1]);
        } catch(\Exception $e) {
            return json_encode(['error' => true, 'message' =>    $e->getMessage(), 'code' => $e->getCode()]);
        }
    }

    public function participarDieta (Request $request)
    {
        try {    
            Auth::user()->participarDieta($request->all());
            return json_encode(['error' => false, 'message' => "Participação com sucesso", "code" => 1]);
        } catch(\Exception $e) {
            return json_encode(['error' => true, 'message' =>    $e->getMessage(), 'code' => $e->getCode()]);
        }
    }
    public function removerParticipacao (Request $request)
    {
        try {    

            //dd($request->all());
            Auth::user()->removerParticipacao($request->all());
            return json_encode(['error' => false, 'message' => "Participação removida com sucesso", "code" => 1]);
        } catch(\Exception $e) {
            return json_encode(['error' => true, 'message' =>    $e->getMessage(), 'code' => $e->getCode()]);
        }
    }

    public function adicionarPeso (Request $request) 
    {
        Auth::user()->adicionarPeso($request->all());
    }
}
