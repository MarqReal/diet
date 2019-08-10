<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistroController extends Controller
{
    public function index() 
    {
    	return view("registro.index");
    }
}
