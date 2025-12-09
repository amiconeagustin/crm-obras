<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Login de usuario.
     * Recibe correo y clave, verifica credenciales
     * y devuelve un token de acceso si son correctas.
     */
    public function login(Request $request)
    {
        // 1) Validamos los datos que llegan en el request
        $credentials = $request->validate([
            'usuarioCorreo' => 'required|email',
            'usuarioClave'  => 'required|string',
        ]);

        // 2) Buscamos al usuario por su correo
        $usuario = Usuario::where('usuarioCorreo', $credentials['usuarioCorreo'])->first();

        // 3) Si no existe el usuario o la clave es incorrecta, devolvemos error 401
        if (! $usuario || ! Hash::check($credentials['usuarioClave'], $usuario->usuarioClave)) {
            return response()->json([
                'error'   => true,
                'mensaje' => 'Correo o contraseña incorrectos',
            ], 401);
        }

        // 4) Si las credenciales son correctas, creamos un token de acceso
        $token = $usuario->createToken('api-token')->plainTextToken;

        // 5) Devolvemos el token + algunos datos básicos del usuario
        return response()->json([
            'error'      => false,
            'mensaje'    => 'Login correcto',
            'token'      => $token,
            'token_type' => 'Bearer',
            'usuario'    => [
                'id'        => $usuario->usuarioId,
                'nombre'    => $usuario->usuarioNombre,
                'apellido'  => $usuario->usuarioApellido,
                'correo'    => $usuario->usuarioCorreo,
                'tipo'      => $usuario->usuarioTipoId,
                'rol'       => $usuario->usuarioRolId,
                'estado'    => $usuario->usuarioEstadoId,
            ],
        ]);
    }
}
