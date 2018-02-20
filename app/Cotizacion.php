<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\CotizacionTrabajo;
use App\Proveedor;

class Cotizacion extends Model
{
    use SoftDeletes; 

    protected $dates = ['deleted_at'];
    protected $table='cotizaciones';
    protected $primaryKey = 'id';

    protected $fillable =  array(
        'numero',
        'descripcion',
        'usuario',
        'estado',
        'costo_material',
        'costo_mo_montaje',
        'costo_mo_programacion',
        'costo_mo_tableros',
        'proveedor_id'
    );

    public function cotizaciontrabajo()
    {
        return $this->hasMany(CotizacionTrabajo::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
