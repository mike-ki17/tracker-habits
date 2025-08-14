<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm (){
        return view('auth.register');
    }

    public function register (Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' =>  'required|min:6|confirmed',
        ]);
        
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);


        // Crear token personal
        $token = $user->createToken('token-personal')->plainTextToken;

        // Si usas sesión
        Auth::guard('web')->login($user);
    

        // Guarda cookie del token
        return redirect('/dashboard')->cookie(
        'api_token',
        $token,
        60 * 24, // 1 día
        '/',
        null,
        false,
        true
    );


    }
}
