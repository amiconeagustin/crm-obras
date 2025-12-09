<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioEstado extends Model
{
    protected $table = 'usuario_estado';
    protected $primaryKey = 'estadoId';
    public $timestamps = true;

    protected $fillable = [
        'estadoNombre',
    ];
}
