<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Devuelve el listado completo de usuarios con sus relaciones básicas.
     * GET /api/usuarios
     */
    public function index()
    {
        // Obtenemos el tamaño de página desde la query (?per_page=), con un valor por defecto
        $perPage = request()->get('per_page', 10); // 10 usuarios por página por defecto

        // Cargamos usuarios con sus relaciones y aplicamos paginación
        $usuarios = Usuario::with(['tipo', 'estado', 'rol'])
            ->paginate($perPage);

        // Devolvemos la paginación completa (datos + links + meta)
        return response()->json($usuarios);
    }

    /**
     * Devuelve un usuario puntual por ID.
     * GET /api/usuarios/{id}
     */
    public function show($id)
    {
        // Buscamos el usuario, si no existe lanza 404 automáticamente
        $usuario = Usuario::with(['tipo', 'estado', 'rol'])
            ->findOrFail($id);

        return response()->json($usuario);
    }

    public function store(Request $request)
    {
        // 1) Validamos los datos que vienen del cliente
        $data = $request->validate([
            'usuarioApodo'           => 'required|string|max:100',
            'usuarioNombre'          => 'required|string|max:100',
            'usuarioApellido'        => 'required|string|max:100',
            'usuarioCorreo'          => 'required|email|max:150|unique:usuarios,usuarioCorreo',
            'usuarioClave'           => 'required|string|min:6',
            'usuarioTel'             => 'nullable|string|max:50',
            'usuarioCel'             => 'nullable|string|max:50',
            'usuarioTipoId'          => 'required|integer|exists:usuarios_tipo,tipoId',
            'usuarioRolId'           => 'required|integer|exists:rol,rolId',
            'usuarioEstadoId'        => 'required|integer|exists:usuario_estado,estadoId',
            'usuarioFechaNacimiento' => 'nullable|date',
        ]);

        // 2) Encriptamos la clave antes de guardar
        $data['usuarioClave'] = Hash::make($data['usuarioClave']);

        // 3) Fecha de alta = ahora (si no viene desde el cliente)
        if (! isset($data['usuarioFechaAlta'])) {
            $data['usuarioFechaAlta'] = now();
        }

        // 4) Creamos el usuario en la base de datos
        $usuario = Usuario::create($data);

        // 5) Devolvemos el usuario creado con código 201 (creado)
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        // Buscamos el usuario, si no existe devolvemos 404
        $usuario = Usuario::findOrFail($id);

        // Validamos datos. El correo debe ser único EXCEPTO el del propio usuario.
        $data = $request->validate([
            'usuarioApodo'           => 'sometimes|required|string|max:100',
            'usuarioNombre'          => 'sometimes|required|string|max:100',
            'usuarioApellido'        => 'sometimes|required|string|max:100',
            'usuarioCorreo'          => 'sometimes|required|email|max:150|unique:usuarios,usuarioCorreo,' . $usuario->usuarioId . ',usuarioId',
            'usuarioClave'           => 'nullable|string|min:6',
            'usuarioTel'             => 'nullable|string|max:50',
            'usuarioCel'             => 'nullable|string|max:50',
            'usuarioTipoId'          => 'sometimes|required|integer|exists:usuarios_tipo,tipoId',
            'usuarioRolId'           => 'sometimes|required|integer|exists:rol,rolId',
            'usuarioEstadoId'        => 'sometimes|required|integer|exists:usuario_estado,estadoId',
            'usuarioFechaNacimiento' => 'nullable|date',
        ]);

        // Si viene una nueva clave, la encriptamos
        if (!empty($data['usuarioClave'])) {
            $data['usuarioClave'] = Hash::make($data['usuarioClave']);
        } else {
            // Si no vino clave, la quitamos del array para no pisar la existente
            unset($data['usuarioClave']);
        }

        // Actualizamos el usuario con los datos recibidos
        $usuario->update($data);

        // Devolvemos el usuario actualizado
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        // Buscamos el usuario, si no existe devolvemos 404
        $usuario = Usuario::findOrFail($id);

        // Eliminamos el registro de la base
        $usuario->delete();

        // Devolvemos una respuesta vacía con código 204 (sin contenido)
        return response()->json(null, 204);
    }

    // Devuelve los datos del usuario autenticado (según el token)
    public function me(Request $request)
    {
        $user = $request->user(); // Usuario autenticado por Sanctum

        return response()->json([
            'error'   => false,
            'usuario' => [
                'id'        => $user->usuarioId,
                'apodo'     => $user->usuarioApodo,
                'nombre'    => $user->usuarioNombre,
                'apellido'  => $user->usuarioApellido,
                'correo'    => $user->usuarioCorreo,
                'tel'       => $user->usuarioTel,
                'cel'       => $user->usuarioCel,
                'tipoId'    => $user->usuarioTipoId,
                'rolId'     => $user->usuarioRolId,
                'estadoId'  => $user->usuarioEstadoId,
            ],
        ]);
    }
}
