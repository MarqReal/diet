<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dica;
class DicaController extends Controller
{
    public function index () 
    {
    	$img = "/img/feed/background-feed.jpg";
    	return view("pages.feed", compact('img'));
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
