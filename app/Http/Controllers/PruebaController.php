<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function index()
    {
        return view('prueba.miprimeravista');
    }

    public function entrada()
    {
        return view('prueba.entrada');
    }

    public function ajustes()
    {
        return view('prueba.ajustes');
    }

    public function sobre()
    {
        return view('prueba.Sobre');
    }

    public function coment()
    {
        return view('prueba.coment');
    }


}
