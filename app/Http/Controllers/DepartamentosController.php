<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DepartamentosController extends Controller {

    public function AgregarDepartamentos () {

    return view('gestiones.departamentos.agregar_departamento');
    }

    public function EditarDepartamentos () {

    return view('gestiones.departamentos.editar_departamento');
    } 
}