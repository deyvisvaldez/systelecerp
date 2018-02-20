<?php

namespace App\Http\Controllers\Obra;

use App\Obra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = Obra::orderBy('numero', 'desc')->get();
        return $obras;
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
            'obra' => 'required',
            'cliente_id' => 'required'
        ];
        $this->validate($request, $rules);

        $obra = Obra::create($request->all());
        return $obra;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function show(Obra $obra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function edit(Obra $obra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obra $obra)
    {
        $rules = [
            'numero' => 'required',
            'obra' => 'required'
        ];
        $this->validate($request, $rules);

        $obra->fill($request->only([
            'numero',
            'obra', 
            'descripcion', 
            'costo', 
            'tipo_moneda',
            'forma_pago',
            'fecha_limite',
            'documentacion'
        ]));

        if($obra->isClean()){
            return  'No se realizo ningun cambio';
        }

        $obra->save();
        return $obra;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obra $obra)
    {
        $obra->delete();
        return $obra;
    }
}
