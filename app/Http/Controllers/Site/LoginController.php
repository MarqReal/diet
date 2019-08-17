<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function index() 
    {
        $img = "/img/login/alimentos-background.jpg";
    	return view("login.index", compact("img"));
    }
    
    public function indexAdmin() 
    {
        $img = "/img/login/constelacao.jpg";
        return view("login.index", compact("img"));
    }

    public function entrar(Request $req) 
    {
    	$dados = $req->all();
    	if(Auth::attempt(['email' => $dados['email'], 'password' => $dados["senha"]])) {
            $usuario = User::where("email", $dados['email'])->first();
    		return json_encode(['error' => false, 'message' => "Login com sucesso", "code" => 1, "typeUser" => $usuario->relacao_type]);
    	} else {
            return json_encode(['error' => true, 'message' => "Login sem sucesso", 'code' => 0]);
        }
    }
    public function sair() 
    {
        Auth::logout();
        return redirect()->route("site.home");  
    }
    
    public function registro() 
    {
        return view("registro.index");
    }

    public function registrarLogin(Request $req) 
    {   
        try { 
            
            $requisicao = $req->all();
            $user = new User();
            $user->registrarLogin($requisicao);
            return json_encode(['error' => false, 'message' => "Cadastrado com sucesso", "code" => 1]);

        } catch(Exception $e) {
            return json_encode(['error' => true, 'message' =>    $e->getMessage(), 'code' => $e->getCode()]);
        }
    }
}
