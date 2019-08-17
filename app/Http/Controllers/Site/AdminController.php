<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() 
    {
        $img = "/img/login/constelacao.jpg";
        return view("login.index", compact("img"));
    }
}
