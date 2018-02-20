<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\OrdenCompraCliente;
use App\Cliente;

class Obra extends Model
{
    use SoftDeletes; 

    protected $dates = ['deleted_at'];
    protected $table='obras';
    protected $primaryKey = 'id';

    protected $fillable =  array(
        'numero',
        'obra', 
        'descripcion', 
        'costo', 
        'tipo_moneda',
        'forma_pago',
        'fecha_limite',
        'documentacion',
        'estado',
        'cliente_id'
    );

    public function ordencompracliente()
    {
        return $this->hasMany(OrdenCompraCliente::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
