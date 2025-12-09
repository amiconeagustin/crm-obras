<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InsumoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned the "api"
| middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ruta de login para obtener token de acceso
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas por token de Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // CRUD de usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index']);
    Route::get('/usuario/{id}', [UsuarioController::class, 'show']);
    Route::post('/usuarios', [UsuarioController::class, 'store']);
    Route::put('/usuario/{id}', [UsuarioController::class, 'update']);
    Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy']);
    Route::get('/me', [UsuarioController::class, 'me']);

    // Rutas CRUD Insumos
    Route::get('/insumos', [InsumoController::class, 'index']);
    Route::get('/insumo/{id}', [InsumoController::class, 'show']);
    Route::post('/insumos', [InsumoController::class, 'store']);
    Route::put('/insumo/{id}', [InsumoController::class, 'update']);
    Route::delete('/insumo/{id}', [InsumoController::class, 'destroy']);
});