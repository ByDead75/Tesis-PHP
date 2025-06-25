<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class EmpresasController extends Controller {

    public function AgregarEmpresas () {

    return view('gestiones.empresas.agregar_empresa');
    }

    public function EditarEmpresas () {

    return view('gestiones.empresas.editar_empresa');
    } 
}