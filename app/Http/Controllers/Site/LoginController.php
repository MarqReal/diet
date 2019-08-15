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
    	return view("login.index");
    }
    
    public function entrar(Request $req) 
    {
    	$dados = $req->all();
    	if(Auth::attempt(['email' => $dados['email'], 'password' => $dados["senha"]])) {
    		return redirect()->route("admin.cursos");
    	}
    	return redirect()->route("login.index");
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
        $requisicao = $req->all();
        $user = new User();
        
        return $user->registrarLogin($requisicao);
    }
}
