<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->tipo_usuario=='SUPER')
        {
            return view('plantillas.superuser');
            #return view('home');
        }
        if(\Auth::user()->tipo_usuario=='ADMIN')
        {
            return view('plantillas.admin');
        }
        if(\Auth::user()->tipo_usuario=='USER')
        {
            $name= \Auth::user()->name;
            $lastname= \Auth::user()->apellidos;
            $ruta_local = $name . "_" . $lastname;
            return redirect()->route('showFilesFolder',$ruta_local);
        }
    }
}
