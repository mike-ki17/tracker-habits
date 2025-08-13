<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/login', function (Request $request) {
    //dd($request->all());  // Muestra los datos recibidos para verificar que llegan
    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Credenciales inválidas'], 401);
    }

    // Crear token personal
    $token = $user->createToken('token-personal')->plainTextToken;

    return response()->json(['token' => $token]);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

