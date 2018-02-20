<?php

namespace App\Http\Controllers\Proveedor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proveedor;

class ProveedorCatalogoController extends Controller
{
    public function index()
    {
        
    }
  
    public function store(Request $request, Proveedor $proveedor)
    {
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();
    
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['title' => $value->title, 'body' => $value->body];
                }
                if(!empty($arr)){
                    DB::table('products')->insert($arr);
                    dd('Insert Recorded successfully.');
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
