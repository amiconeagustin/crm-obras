<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Insumo;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    // LISTAR INSUMOS
    public function index()
    {
        $insumos = Insumo::with(['tipo', 'unidad'])->paginate(10);

        return response()->json($insumos);
    }

    // GUARDAR INSUMO
    public function store(Request $request)
    {
        $data = $request->validate([
            'insumoTipoId' => 'required|integer|exists:insumos_tipo,tipoId',
            'insumoNombre' => 'required|string',
            'insumoUnAplicacionId' => 'required|integer|exists:unidades_aplicacion,unidadApId',
            'insumoUnComercial' => 'nullable|string',
            'insumoUnStandar' => 'nullable|numeric',
            'insumoPrecioUnComercial' => 'required|numeric',
            'insumoFuente' => 'nullable|string',
        ]);

        $insumo = Insumo::create($data);

        return response()->json([
            'mensaje' => 'Insumo creado correctamente',
            'insumo' => $insumo
        ]);
    }


    // OBTENER UN INSUMO
    public function show($id)
    {
        $insumo = Insumo::with(['tipo', 'unidad'])->find($id);

        if (!$insumo) {
            return response()->json(['error' => 'Insumo no encontrado'], 404);
        }

        return response()->json($insumo);
    }

    // ACTUALIZAR INSUMO
    public function update(Request $request, $id)
    {
        $insumo = Insumo::find($id);

        if (!$insumo) {
            return response()->json(['error' => 'Insumo no encontrado'], 404);
        }

        $insumo->update($request->all());

        return response()->json([
            'mensaje' => 'Insumo actualizado correctamente',
            'insumo' => $insumo
        ]);
    }

    // ELIMINAR INSUMO
    public function destroy($id)
    {
        $insumo = Insumo::find($id);

        if (!$insumo) {
            return response()->json(['error' => 'Insumo no encontrado'], 404);
        }

        $insumo->delete();

        return response()->json(['mensaje' => 'Insumo eliminado correctamente']);
    }
}
