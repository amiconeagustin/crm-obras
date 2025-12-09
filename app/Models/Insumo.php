<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumos';
    protected $primaryKey = 'insumoId';
    public $timestamps = true;

    protected $fillable = [
        'insumoTipoId',
        'insumoNombre',
        'insumoUnAplicacionId',
        'insumoUnComercial',
        'insumoUnStandar',
        'insumoPrecioUnComercial',
        'insumoFuente'
    ];

    // Relación: un insumo pertenece a un tipo
    public function tipo()
    {
        return $this->belongsTo(InsumoTipo::class, 'insumoTipoId', 'tipoId');
    }

    // Relación: un insumo pertenece a una unidad de aplicación
    public function unidad()
    {
        return $this->belongsTo(UnidadAplicacion::class, 'insumoUnAplicacionId', 'unidadApId');
        // fk en insumos                          ↑                   ↑ pk en unidades_aplicacion
    }

}
