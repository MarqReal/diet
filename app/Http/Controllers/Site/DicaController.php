<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dica;
use App\Dieta;
use Auth;
class DicaController extends Controller
{
    public function index () 
    {
    	$img = "/img/feed/background-feed.jpg";
        $todos = Dieta::exibirBibliotecaDietas(Auth::user());
        if ($todos[0]->pivot->ativo == true) {
            $diff = date_diff(date_create(date("Y-m-d")), date_create($todos[0]->pivot->dt_inicio));
            //dd($diff);


        }
        $devePesar = (isset($todos[0]) && $todos[0]->pivot->ativo) ? true : false;

    	return view("pages.feed", compact('img', 'devePesar'));
    }


    public function exibirDicas()
    {
    	try {
    		 return Dica::exibirDicas();
    	}catch(\Exception $e) {
    		return json_encode(['error' => true, 'message' => "Não foi possivel buscar os Tweets", "code" => 1, "msg" => $e->getMessage()]);
    	}

    }
}
