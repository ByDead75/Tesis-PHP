<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa la fachada Auth

class LoginController extends Controller
{
    /**
     * Muestra el formulario de login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de tener una vista 'auth/login.blade.php'
    }

    /**
     * Maneja la solicitud de login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validar los datos de entrada
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Intentar autenticar al usuario
        // Auth::attempt() intenta loguear al usuario con las credenciales dadas.
        // Retorna true si las credenciales son válidas y el usuario es logueado, false en caso contrario.
        if (Auth::attempt($credentials)) {
            // Regenerar la sesión para prevenir ataques de fijación de sesión
            $request->session()->regenerate();

            // Redirigir al usuario a la página deseada después del login (e.g., /home o el dashboard)
            return redirect()->intended('/home')->with('success', '¡Has iniciado sesión correctamente!');
        }

        // 3. Si la autenticación falla, redirigir de nuevo al formulario de login con un error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email'); // Mantener el email ingresado en el formulario
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario

        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/')->with('success', '¡Has cerrado sesión correctamente!'); // Redirige a la página de inicio
    }
}