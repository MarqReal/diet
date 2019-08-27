<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlimentoController extends Controller
{
    public function index ()
    {
    	return view("admin.alimentos.index");
    }
    public function adicionar ()
    {
    	return view("admin.alimentos.adicionar");
    }
}
