<?php

namespace App\Http\Controllers\OrdenCompraCliente;

use App\OrdenCompraCliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdenCompraClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('numero', 'desc')->get();
        return $clientes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrdenCompraCliente  $ordenCompraCliente
     * @return \Illuminate\Http\Response
     */
    public function show(OrdenCompraCliente $ordenCompraCliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrdenCompraCliente  $ordenCompraCliente
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenCompraCliente $ordenCompraCliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrdenCompraCliente  $ordenCompraCliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenCompraCliente $ordenCompraCliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrdenCompraCliente  $ordenCompraCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenCompraCliente $ordenCompraCliente)
    {
        //
    }
}
