<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\OrdenCompraProveedor;
use App\Cotizacion;
use App\Catalogo;

class Proveedor extends Model
{
    use SoftDeletes; 

    protected $dates = ['deleted_at'];
    protected $table='proveedores';
    protected $primaryKey = 'id';

    protected $fillable =  array(
        'nombre', 
        'descripcion',
        'descuento'
    );

    public function cotizacion()
    {
        return $this->hasMany(Cotizacion::class);
    }

    public function catalogo()
    {
        return $this->hasMany(Catalogo::class);
    }

    public function ordencompraproveedor()
    {
        return $this->hasMany(OrdenCompraProveedor::class);
    }
}
