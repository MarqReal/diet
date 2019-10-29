<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Dica extends Model
{
    public static function exibirDicas()
    {
        $meses["01"] = "Jan";
        $meses["02"] = "Fev";
        $meses["03"] = "Mar";
        $meses["04"] = "Abr";
        $meses["05"] = "Mai";
        $meses["06"] = "Jun";
        $meses["07"] = "Jul";
        $meses["08"] = "Ago";
        $meses["09"] = "Set";
        $meses["10"] = "Out";
        $meses["11"] = "Nov";
        $meses["12"] = "Dez";
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
    			$day = date('d', strtotime($tweet['created_at']));
                $month = date('m', strtotime($tweet['created_at']));
                $formatted_date = $day."/".$meses[$month]; 
    			//$formatted_date = date('d/m/Y', strtotime($tweet['created_at']));

    			$retorno[$key]['data'] = $formatted_date;
    		}
    	}
    	return json_encode($retorno);
    }
}
