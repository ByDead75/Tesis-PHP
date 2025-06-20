<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    public function MuestraCambioPasswordIndex()
    {
        return view('auth.password');
    }

    public function ActualizarPassword(Request $request)
    {
        // 1. Validar los datos de entrada
        $request->validate([
            'contraseña_actual' => ['required', 'string'],
            'password' => ['required', 'string',
                            Password::min(8)
                                    ->letters()
                                    ->mixedCase()
                                    ->numbers()
                                    ->symbols(),
                            'confirmed',
                            'different:contraseña_actual'
                            ],
            'confirmar_contraseña' => ['required', 'string'],
        ]);

        // 2. Verificar que la contraseña actual sea correcta
        if (!Hash::check($request->contraseña_actual, Auth::user()->password)) {
            return back()->withErrors([
                'contraseña_actual' => 'La contraseña actual es incorrecta.',
            ]);
        }

        // 3. Actualizar la contraseña del usuario
        Auth::user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        // 4. Redirigir con un mensaje de éxito
        return redirect()->route('index')->with('success', 'Contraseña actualizada correctamente.');
    }
}