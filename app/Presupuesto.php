<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\PresupuestoTrabajo;
use App\Obra;

class Presupuesto extends Model
{
    use SoftDeletes; 

    protected $dates = ['deleted_at'];
    protected $table='presupuestos';
    protected $primaryKey = 'id';

    protected $fillable =  array(
        'numero',
        'descripcion',
        'presupuestador',
        'vendedor',
        'cliente',
        'estado',
        'costo_material',
        'costo_mo_montaje',
        'costo_mo_programacion',
        'costo_mo_tableros',
        'obra_id'
    );

    public function presupuestotrabajo()
    {
        return $this->hasMany(PresupuestoTrabajo::class);
    }

    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }
}
