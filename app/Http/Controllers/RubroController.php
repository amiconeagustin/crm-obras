<?php

namespace App\Http\Controllers;

use App\Models\Rubro;
use Illuminate\Http\Request;

class RubroController extends Controller
{
    /**
     * Lista todos los rubros.
     *
     * GET /api/rubros
     */
    public function index()
    {
        // Se pueden agregar ordenamientos o filtros más adelante
        $rubros = Rubro::orderBy('rubroNombre', 'asc')->get();

        return response()->json($rubros, 200);
    }

    /**
     * Crea un nuevo rubro.
     *
     * POST /api/rubros
     */
    public function store(Request $request)
    {
        // Validamos los datos de entrada
        $validated = $request->validate([
            'rubroNombre' => 'required|string|max:255',
        ]);

        // Creamos el rubro (timestamp se setea por defecto en la BD)
        $rubro = Rubro::create([
            'rubroNombre'    => $validated['rubroNombre'],
            // Si quisieras setear manualmente:
            // 'rubroTimestamp' => now(),
        ]);

        return response()->json($rubro, 201);
    }

    /**
     * Devuelve un rubro específico.
     *
     * GET /api/rubros/{rubroId}
     */
    public function show($id)
    {
        $rubro = Rubro::findOrFail($id);

        return response()->json($rubro, 200);
    }

    /**
     * Actualiza un rubro existente.
     *
     * PUT/PATCH /api/rubros/{rubroId}
     */
    public function update(Request $request, $id)
    {
        $rubro = Rubro::findOrFail($id);

        // Validamos datos
        $validated = $request->validate([
            'rubroNombre' => 'required|string|max:255',
        ]);

        // Actualizamos solo el nombre
        $rubro->update([
            'rubroNombre' => $validated['rubroNombre'],
        ]);

        return response()->json($rubro, 200);
    }

    /**
     * Elimina un rubro.
     *
     * DELETE /api/rubros/{rubroId}
     */
    public function destroy($id)
    {
        $rubro = Rubro::findOrFail($id);

        $rubro->delete();

        return response()->json([
            'message' => 'Rubro eliminado correctamente',
        ], 200);
    }
}
