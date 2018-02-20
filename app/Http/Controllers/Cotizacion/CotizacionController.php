<?php

namespace App\Http\Controllers\Cotizacion;

use App\Cotizacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones = Cotizacion::orderBy('numero', 'desc')->get();
        return $cotizaciones;
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
        $rules = [
            'numero' => 'required',
            'usuario' => 'required',
            'obra_id' => 'required'
        ];
        $this->validate($request, $rules);

        $cotizacion = Cotizacion::create($request->all());
        return $cotizacion;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        $rules = [
            'numero' => 'required',
            'usuario' => 'required',
            'obra_id' => 'required'
        ];
        $this->validate($request, $rules);

        $cotizacion->fill($request->only([
            'numero',
            'descripcion', 
            'usuario', 
            'estado'
        ]));

        if($cotizacion->isClean()){
            return  'No se realizo ningun cambio';
        }

        $cotizacion->save();
        return $cotizacion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizacion $cotizacion)
    {
        $cotizacion->delete();
        return $cotizacion;
    }
}