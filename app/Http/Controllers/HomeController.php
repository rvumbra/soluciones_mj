<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Crea una nueva instancia del controllador.
     *
     * Aplica el middleware de autorización.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Carga la vista inicial del home para usuarios autenticados.
     *
     * @return \Illuminate\Contracts\Support\Renderable Vista a cargar.
     */
    public function index()
    {
        return view('home');
    }
}
