<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioTipo extends Model
{
    protected $table = 'usuarios_tipo';
    protected $primaryKey = 'tipoId';
    public $timestamps = true;

    protected $fillable = [
        'tipoNombre',
    ];
}
