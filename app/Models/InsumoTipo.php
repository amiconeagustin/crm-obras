<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsumoTipo extends Model
{
    protected $table = 'insumos_tipo';
    protected $primaryKey = 'tipoId';
    public $timestamps = true;

    protected $fillable = [
        'tipoNombre'
    ];

    // Relación: Un tipo tiene muchos insumos
    public function insumos()
    {
        return $this->hasMany(Insumo::class, 'insumoTipoId', 'tipoId');
    }
}
