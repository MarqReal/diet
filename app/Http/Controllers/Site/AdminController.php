<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() 
    {
        $img = "/img/cms/login/background-cms-login.jpg";
        $hidden = true;
        return view("login.index", compact("img", "hidden"));
    }
    public function home() 
    {
        return view("admin.index");
    }
}
