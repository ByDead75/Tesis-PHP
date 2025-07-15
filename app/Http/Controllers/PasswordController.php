<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    public function MuestraCambioPasswordIndex()
    {
        $usuario = Auth::guard('usuarios')->user();

        return view('auth.password', compact(['usuario']));
    }

    public function CambiarPassword(Request $request) {

    $validator = Validator::make($request->all(), [
        'password_actual' => ['required', function ($attribute, $value, $fail) {
            if (md5($value) !== auth()->user()->password) {
                $fail('La contraseña actual no es correcta');
            }
        }],
        'nuevo_password' => ['required', 'string', 'min:5', 'different:password_actual'],
        'confirmar_password' => ['required'],
    ], [
        'password.required' => 'La nueva contraseña es requerida',
        'password.min' => 'La contraseña debe tener al menos 5 caracteres',
        'password.different' => 'La nueva contraseña debe ser diferente a la actual',
        'confirmar_password.same' => 'La confirmación no coincide con la nueva contraseña',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    if ($request->input('nuevo_password') ===  $request->input('confirmar_password')) {
        $nuevaContraseña = $request->input('nuevo_password');
    } else {
        return back()->with('error', 'Las contraseñas no coinciden');
    }

    // Actualizar la contraseña
    $user = auth()->user();
    $user->password = md5($nuevaContraseña); // Cambia a MD5 para almacenar la nueva contraseña
    $user->save();

        Auth::guard('usuarios')->logout(); // Cierra la sesión del usuario

        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/login');
    }
}
