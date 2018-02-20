<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    
    public function index()
    {
        $clientes = Cliente::orderBy('nombre', 'asc')->get();
        return $clientes;
    }
  
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required'
        ];
        $this->validate($request, $rules);

        $cliente = Cliente::create($request->all());
        return $cliente;
    }

    public function update(Request $request, Cliente $cliente)
    {
        $rules = [
            'nombre' => 'required'
        ];
        $this->validate($request, $rules);

        $cliente->fill($request->only([
            'nombre',
            'planta',
            'direccion',
            'descripcion'
        ]));

        if($cliente->isClean()){
            return  'No se realizo ningun cambio';
        }

        $cliente->save();
        return $cliente;
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return $cliente;
    }
}
