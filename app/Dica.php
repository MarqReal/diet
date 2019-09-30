<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Dica extends Model
{
    public static function exibirDicas()
    {
        $retorno = null;
    	$nutricionistas = Auth::user()->relacao->nutricionistas()->get();
    	if (count($nutricionistas) > 0) {
    		foreach ($nutricionistas as $key => $nutricionista) {
    			$arrNutricionistas[$nutricionista->user_name] = $nutricionista->nome; 
    		}
    	}
    	$tweets = \Twitter::getMentionsTimeline(['count' => 20, 'format' => 'array']);
    	foreach ($tweets as $key => $tweet) {
    		$userPost = $tweet['user']['screen_name'];
    		if (isset($arrNutricionistas[$userPost])) {
    			$retorno[$key]["screen_name"] = $userPost;
    			$retorno[$key]["nome"] = $arrNutricionistas[$userPost];
    			$retorno[$key]["mensagem"] = str_replace("@AppDiet1"," ",$tweet['text']);
    			$retorno[$key]['imagem'] = $tweet['user']['profile_image_url_https'];
    			$formatted_date = date('d/m/Y', strtotime($tweet['created_at']));
    			//$formatted_date = date('d/m/Y', strtotime($tweet['created_at']));

    			$retorno[$key]['data'] = $formatted_date;
    		}
    	}
    	return json_encode($retorno);
    }
}
