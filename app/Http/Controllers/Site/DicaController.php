<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dica;
class DicaController extends Controller
{
    public function index () 
    {
    	return view("pages.feed");
    }

    public function exibirDicas()
    {
    	try {
    		dd(Dica::exibirDicas());
    	}catch(\Exception $e) {

    	}

    }
}
