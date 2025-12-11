<?php

namespace App\Http\Controllers;

use App\Models\InsumoTipo;
use App\Models\UnidadAplicacion;

class MetaInsumoController extends Controller
{
    // GET /api/insumos-tipo
    public function tipos()
    {
        // Devolvemos id + nombre (igual que hiciste con usuario-tipos)
        $tipos = InsumoTipo::select(
            'tipoId as id',
            'tipoNombre as nombre'
        )->get();

        return response()->json($tipos);
    }

    // GET /api/unidades-aplicacion
    public function unidades()
    {
        // Devolvemos id, nombre y código (mt, ml, etc.)
        $unidades = UnidadAplicacion::select(
            'unidadApId as id',
            'unidadApNombre as nombre',
            'unidadApCodigo as codigo'
        )->get();

        return response()->json($unidades);
    }
}
