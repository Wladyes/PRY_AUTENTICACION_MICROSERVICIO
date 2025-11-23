<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//Health check endpoint
Route::get('health', function () {
    return response()->json(['status' => 'OK']);
});

// Ruta para registrar usuario 
Route::post('register', [AuthController::class, 'register']);
                
// Ruta para login de usuario
Route::post('login', [AuthController::class, 'login']);

// Ruta para validar token (protegida con Sanctum)
Route::middleware('auth:sanctum')->get('validate-token', [AuthController::class, 'validateToken']);

