<?php

namespace App\Http\Controllers;

use App\Models\UsuarioTipo;
use App\Models\Rol;
use App\Models\Estado;

class MetaUsuarioController extends Controller
{
    // GET /api/usuario-tipos
    public function tipos()
    {
        // Ajustá las columnas del select a las que realmente tengas
        $tipos = UsuarioTipo::select('tipoId as id', 'tipoNombre as nombre')->get();

        return response()->json($tipos);
    }

    // GET /api/roles
    public function roles()
    {
        $roles = Rol::select('rolId as id', 'rolNombre as nombre')->get();

        return response()->json($roles);
    }

    // GET /api/estados
    public function estados()
    {
        // Estos solo los usás para mostrar en la tabla según dijiste
        $estados = Estado::select('estadoId as id', 'estadoNombre as nombre')->get();

        return response()->json($estados);
    }
}
