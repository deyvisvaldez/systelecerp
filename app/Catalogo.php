<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Proveedor;

class Catalogo extends Model
{

    protected $table='catalogos';
    protected $primaryKey = 'id';

    protected $fillable =  array(
        'numero_almacen',
        'codigo',
        'categoria',
        'descripcion',
        'descripcion_adicional',
        'costo_lista',
        'costo_neto',
        'moneda',
        'iva',
        'proveedor_id'
    );

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
