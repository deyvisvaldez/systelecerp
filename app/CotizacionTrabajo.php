<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Cotizacion;
use App\CotizacionSubTrabajo;

class CotizacionTrabajo extends Model
{
    use SoftDeletes; 

    protected $dates = ['deleted_at'];
    protected $table='cotizacion_trabajos';
    protected $primaryKey = 'id';

    protected $fillable =  array(
        'item',
        'descripcion',
        'cotizacion_id'
    );

    public function cotizacionsubtrabajo()
    {
        return $this->hasMany(CotizacionSubTrabajo::class);
    }

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class);
    }
}
