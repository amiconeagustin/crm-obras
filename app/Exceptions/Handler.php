<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Campos sensibles que no se deben incluir en los mensajes de validación.
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Registrar callbacks para manejar excepciones.
     */
    public function register(): void
    {
        // Acá más adelante podemos registrar logs o reporting personalizado
    }

    /**
     * Manejo de usuarios no autenticados.
     *
     * En vez de redirigir a una ruta "login" (que no existe en esta API),
     * devolvemos un JSON con código 401.
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'message' => 'Unauthenticated.',
            ], 401);
        }

        // Si en el futuro tenés parte web, se puede cambiar esto.
        return response()->json([
            'message' => 'Unauthenticated.',
        ], 401);
    }
}