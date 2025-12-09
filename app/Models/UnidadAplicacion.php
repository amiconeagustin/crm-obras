<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadAplicacion extends Model
{
    protected $table = 'unidades_aplicacion';
    protected $primaryKey = 'unidadApId';   // 👈 CORREGIDO
    public $timestamps = true;

    protected $fillable = [
        'unidApNombre',   // o 'unidadAplNombre' según tu migración
        'unidApCodigo'    // idem arriba
    ];

    // Relación: Una unidad de aplicación tiene muchos insumos
    public function insumos()
    {
        return $this->hasMany(Insumo::class, 'insumoUnidadAplicacionId', 'unidadAplId');
        // fk en insumos               ↑                         ↑ pk de esta tabla
    }
}
