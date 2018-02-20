<?php

namespace App\Http\Controllers\Proveedor;

use App\Proveedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorController extends Controller
{

    public function index()
    {
        $proveedores = Proveedor::orderBy('nombre', 'asc')->get();
        return $proveedores;
    }
  
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required'
        ];
        $this->validate($request, $rules);

        $proveedor = Proveedor::create($request->all());
        return $proveedor;
    }

    public function update(Request $request, proveedor $proveedor)
    {
        $rules = [
            'nombre' => 'required'
        ];
        $this->validate($request, $rules);

        $proveedor->fill($request->only([
            'nombre',
            'direccion',
            'descuento'
        ]));

        if($proveedor->isClean()){
            return  'No se realizo ningun cambio';
        }

        $proveedor->save();
        return $proveedor;
    }

    public function destroy(proveedor $proveedor)
    {
        $proveedor->delete();
        return $proveedor;
    }
}
