<?php

namespace App\Http\Controllers\Proveedor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proveedor;
use Excel;
use Validator;
use Session;
use DB;

class ProveedorCatalogoController extends Controller
{
    
    public function index()
    {
        
    }
  
    public function importExcel(Request $request)
    {
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = [
                        'proveedor_id' => 2,
                        'numero_almacen' => $value->numero_almacen, 
                        'codigo' => $value->codigo, 
                        'categoria' => $value->categoria, 
                        'descripcion' => $value->descripcion, 
                        'descripcion_adicional' => $value->descripcion_adicional, 
                        'costo_lista' => $value->costo_lista, 
                        'costo_neto' => $value->costo_neto, 
                        'moneda' => $value->modeda, 
                        'iva' => $value->iva
                    ];
                }
                if(!empty($arr))
                {
                    \DB::table('catalogos')->insert($arr);
                    return redirect('proveedores')->with('message','Comic Records Successfully Imported');
                }
            }
        }
        dd('Request data does not have any files to import.');  
    
    }

    public function update(Request $request, proveedor $proveedor)
    {
        
    }

    public function destroy(proveedor $proveedor)
    {
        
    }

}
