<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa la fachada Auth
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de tener una vista 'auth/login.blade.php'
    }

    public function login(Request $request)
    {
        // 1. Validar los datos de entrada
        
        $credentials = $request->only(['cedula', 'password']);

        $usuario = \App\Models\Usuarios::find($credentials['cedula']);

        // dd($usuario);

        if ($usuario && md5($credentials['password']) === $usuario->password) {

    
            Auth::guard('usuarios')->login($usuario);

            // Redirigir al usuario a la página deseada después del login 
            return redirect()->intended('/');
        }else {
            throw ValidationException::withMessages([
                'cedula' => ['El usuario o la contraseña son incorrectos.'], // Mensaje general para cédula/contraseña
                // También puedes ser más específico si la lógica lo permite,
                // por ejemplo, si sabes que la cédula existe pero la contraseña no
            ]);
        }
        
    }

    public function inicio(){
        $usuario = auth()->guard('usuarios')->user();
        return view('index', compact('usuario')); 
    }

    
    public function logout(Request $request)
    {
        Auth::guard('usuarios')->logout(); // Cierra la sesión del usuario

        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/login'); // Redirige a la página de login
    }
}