<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Registro de usuario
    public function register(Request $request) //function register(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255', // Nombre de usuario
                'email' => 'required|email|unique:users,email', // Email único
                'password' => 'required|string|min:6|confirmed', // Contraseña con confirmación
            ]);
              // Crear usuario
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
              // Crear token de acceso
            $token = $user->createToken('api_token')->plainTextToken;
              // Responder con datos del usuario y token
            return response()->json([
                'message' => 'Usuario registrado correctamente',
                'user' => $user,
                'token' => $token,
            ], 201);
             // Capturar errores
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error en el registro',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Login de usuario
    public function login(Request $request) //function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if (!Auth::attempt($credentials)) {
                return response()->json(['message' => 'Credenciales inválidas'], 401);
            }

            $user = Auth::user();
            $token = $user->createToken('api_token')->plainTextToken;

            return response()->json([
                'message' => 'Inicio de sesión exitoso',
                'user' => $user,
                'token' => $token,
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error en el login',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Validar token (para integración con otros microservicios)
    public function validateToken(Request $request) //function validateToken(Request $request)
    {
        return response()->json([
            'message' => 'Token válido',
            'user' => $request->user(),
        ]);
    }
}
