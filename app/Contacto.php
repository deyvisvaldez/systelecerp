<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Cliente;

class Contacto extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table='contactos';
    protected $primaryKey = 'id';
    protected $fillable =  array(
        'nombre', 
        'puesto', 
        'email', 
        'telefono', 
        'celular', 
        'cliente_id'
    );
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
