<?php

namespace App\Http\Controllers\Presupuesto;

use App\Presupuesto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presupuestos = Presupuesto::orderBy('numero', 'desc')->get();
        return $presupuestos;
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

        $presupuesto = Presupuesto::create($request->all());
        return $presupuesto;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function show(presupuesto $presupuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(presupuesto $presupuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, presupuesto $presupuesto)
    {
        $rules = [
            'numero' => 'required',
            'usuario' => 'required',
            'obra_id' => 'required'
        ];
        $this->validate($request, $rules);

        $presupuesto->fill($request->only([
            'numero',
            'descripcion', 
            'usuario', 
            'estado'
        ]));

        if($presupuesto->isClean()){
            return  'No se realizo ningun cambio';
        }

        $presupuesto->save();
        return $presupuesto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(presupuesto $presupuesto)
    {
        $presupuesto->delete();
        return $presupuesto;
    }
}