<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa la fachada Auth
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    
    public function MostrarLoginForm()
    {
        return view('auth.login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['cedula', 'password']);
        

        $usuario = \App\Models\Usuario::where('cedula',$credentials['cedula'])->first();
        
        if ($usuario && md5($credentials['password']) === $usuario->password) {
                
            Auth::guard('usuarios')->login($usuario);
            session(['nombre_usuario' => Auth::guard('usuarios')->user()->nombre]);

            return redirect()->route('index');
        }else {
            throw ValidationException::withMessages([
                'cedula' => ['El usuario o la contraseña son incorrectos.'], 
            ]);
        }
        
    }

    public function logout(Request $request)
    {
        Auth::guard('usuarios')->logout(); // Cierra la sesión del usuario

        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/login'); // Redirige a la página de login
    }

    
}