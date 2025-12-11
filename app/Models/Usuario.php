<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens; // Trait de Sanctum para manejar tokens
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

    // Para que la contraseña no salga nunca en JSON
    protected $hidden = [
        'usuarioClave',
        'remember_token',
    ];

    // Relaciones básicas
    public function tipo()
    {
        return $this->belongsTo(UsuarioTipo::class, 'usuarioTipoId', 'tipoId');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'usuarioEstadoId', 'estadoId');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'usuarioRolId', 'rolId');
    }

}
