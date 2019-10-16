<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dica;
use App\Dieta;
use Auth;
use App\Peso;
class DicaController extends Controller
{
    public function index () 
    {
    	$img = "/img/feed/background-feed.jpg";
        $todos = Dieta::exibirBibliotecaDietas(Auth::user());
        $devePesar = false;
        if (isset($todos[0])) {
            if ($todos[0]->pivot->ativo == true || ($todos[0]->pivot->ativo == false && $todos[0]->pivot->dt_termino == date("Y-m-d")) ) {
                $diff = date_diff(date_create(date("Y-m-d")), date_create($todos[0]->pivot->dt_inicio));
                $diferancaDias = $diff->format("%a%");
                $qtdPesoHoje = Peso::where([ 
                    ['user_id', '=', Auth::user()->id],
                    ['dieta_id', '=', $todos[0]->pivot->dieta_id],
                    ['quantidade_participacao', '=', $todos[0]->pivot->quantidade_participacao],
                    ['dt_pesagem', '=', date("Y-m-d")]
                ])->count();
                if ($diferancaDias != 0 && $diferancaDias % 7 == 0 && $qtdPesoHoje == 0) {
                    $devePesar = true;        
                }
            }
        }
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
