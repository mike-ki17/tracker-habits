<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user){
            return back()->withErrors([
                'email' => 'Usuario no encontrado',
            ])->onlyInput('email');
        }
        else if (! Hash::check($request->password, $user->password) && $user){
            return back()->withErrors([
                'password' => 'Contraseña incorrecta',
            ])->onlyInput('password');
        }
        else if (! $user || ! Hash::check($request->password, $user->password)) 
        {
            return back()->withErrors([
                'email' => 'Credenciales incorrectas',
            ])->onlyInput('email');
        }
        

        // Crear token personal
        $token = $user->createToken('token-personal')->plainTextToken;

         // Crear sesión usando guard web
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // Guarda el token en cookie
        return redirect('/dashboard')->cookie(
            'api_token',  // nombre de cookie
            $token,       // valor
            60 * 24,      // duración en minutos
            '/',          // path
            null,         // dominio (null usa el actual)
            false,        // secure (true en producción con HTTPS)
            true          // httpOnly
        );

    }


    public function logout (Request $request)
    {
        Auth::logout();              // Cierra la sesión
        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF
        return redirect('/login');   // Redirige al login
    }


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
