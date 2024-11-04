<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*public function __invoke()
    {
        return view('home');
    }*/
     
    public function index()
    {
        return view('moduls.miprimeravista');
    }

    public function entrada()
    {
        return view('moduls.entrada');
    }

    public function ajustes()
    {
        return view('moduls.ajustes');
    }

    public function sobre()
    {
        return view('moduls.Sobre');
    }

    public function coment()
    {
        return view('moduls.coment');
    }

}
