<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Contacto;
use App\Obra;

class Cliente extends Model
{
    use SoftDeletes; 

    protected $dates = ['deleted_at'];
    protected $table='clientes';
    protected $primaryKey = 'id';

    protected $fillable =  array('nombre', 'planta', 'direccion', 'descripcion');

    public function contacto()
    {
        return $this->hasMany(Contacto::class);
    }

    public function obra()
    {
        return $this->hasMany(Obra::class);
    }
}
