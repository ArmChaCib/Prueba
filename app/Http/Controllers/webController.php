<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function listadoDeTareas()
    {
        return view('listadoDeTareas');
    }

    public function agregarTarea()
    {
        return view('agregarTarea');
    }

    public function editarTarea()
    {
        return view('editarTarea');
    }
}
