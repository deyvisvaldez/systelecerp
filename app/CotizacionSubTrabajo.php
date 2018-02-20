<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\CotizacionTrabajo;

class CotizacionSubTrabajo extends Model
{
    use SoftDeletes; 

    protected $dates = ['deleted_at'];
    protected $table='cotizacionessubtrabajos';
    protected $primaryKey = 'id';

    protected $fillable =  array(
        'item',
        'descripcion',
        'unidad',
        'cantidad',
        'costo_material',
        'tipo_moneda',
        'costo_mo_montaje',
        'costo_mo_programacion',
        'costo_mo_tablero',
        'cotizaciontarea_id'
    );


    public function cotizaciontrabajo()
    {
        return $this->belongsTo(CotizacionTrabajo::class);
    }
}
