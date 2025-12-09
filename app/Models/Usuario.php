<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'usuarioId';
    public $timestamps = true;

    protected $fillable = [
        'usuarioApodo',
        'usuarioNombre',
        'usuarioApellido',
        'usuarioCorreo',
        'usuarioClave',
        'usuarioTel',
        'usuarioCel',
        'usuarioTipoId',
        'usuarioRolId',
        'usuarioEstadoId',
        'usuarioFechaAlta',
        'usuarioFechaNacimiento',
    ];

    // Relaciones básicas
    public function tipo()
    {
        return $this->belongsTo(UsuarioTipo::class, 'usuarioTipoId', 'tipoId');
    }

    public function estado()
    {
        return $this->belongsTo(UsuarioEstado::class, 'usuarioEstadoId', 'estadoId');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'usuarioRolId', 'rolId');
    }
}
