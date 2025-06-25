<?php

namespace App\Http\Controllers;
use App\Models\Bancos;
use Illuminate\Http\Request;

class UsuariosController extends Controller {

    public function CrearUsuarios () {

    return view('gestiones.usuarios.crear_usuario');
    }

    public function EditarUsuarios () {

    return view('gestiones.usuarios.editar_usuario');
    } 
}