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
            'insumoTipoId' => 'required|integer',
            'insumoNombre' => 'required|string',
            'insumoUnAplicacionId' => 'required|integer',
            'insumoUnComercial' => 'nullable|integer',
            'insumoUnStandar' => 'nullable|numeric',
            'insumoPrecioUnComercial' => 'nullable|numeric',
            'insumoFuente' => 'nullable|string',
            'insumoDescripcion' => 'nullable|string',
            'insumoRendimientoValor' => 'nullable|numeric',
            'insumoRendimientoUnAplicacionId' => 'nullable|integer',
            'insumoEstadoId' => 'required|integer',
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
