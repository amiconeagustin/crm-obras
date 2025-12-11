<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    // Nombre de la tabla asociada
    protected $table = 'rubros';

    // Clave primaria personalizada
    protected $primaryKey = 'rubroId';

    // Indicamos que no usamos created_at / updated_at
    public $timestamps = false;

    // Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'rubroNombre',
        'rubroTimestamp',
    ];
}
