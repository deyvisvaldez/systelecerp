<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
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
    public function dashboard()
    {
        return view('dashboard');
    }

    public function indicadores() 
    {
        return view('indicadores');
    }

    public function presupuestos() 
    {
        return view('presupuestos');
    }

    public function proyectos() 
    {
        return view('proyectos');
    }

    public function ordenes_compras() 
    {
        return view('ordenes_compras');
    }

    public function stocks() 
    {
        return view('stocks');
    }

    public function clientes() 
    {
        return view('clientes');
    }

    public function proveedores() 
    {
        return view('proveedores');
    }

    public function configuraciones() 
    {
        return view('configuraciones');
    }
}