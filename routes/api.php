<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//Health check endpoint
Route::get('health', function () {
    return response()->json(['status' => 'OK']);  // Respuesta simple para health check
});

// Ruta para registrar usuario 
Route::post('register', [AuthController::class, 'register']); // Ruta para registrar usuario
                
// Ruta para login de usuario
Route::post('login', [AuthController::class, 'login']); // Ruta para login de usuario

// Ruta para validar token (protegida con Sanctum)
Route::middleware('auth:sanctum')->get('validate-token', [AuthController::class, 'validateToken']); // Ruta para validar token (protegida con Sanctum)

