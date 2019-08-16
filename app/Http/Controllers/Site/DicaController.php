<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DicaController extends Controller
{
    public function index () {
    	return view("pages.feed");
    }
}
