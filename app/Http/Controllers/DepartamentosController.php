<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentosController extends Controller {

    public function AgregarDepartamentos () {

    return view('gestiones.departamentos.agregar_departamento');
    }

    public function EditarDepartamentos () {

    return view('gestiones.departamentos.editar_departamento');
    } 

    public function BuscarDepartamentoGerencia (Request $request)
    {

        if ($request->ajax()) {
            $departamento_gerencia_model = new Departamento;
            $departamento_gerencia = $departamento_gerencia_model->get_departamento_gerencia(
                                                                                    $request->codigo_empresa,
                                                                                    $request->codigo_direccion,
                                                                                    $request->codigo_gerencia);
            return response()->json($departamento_gerencia);
        }

    } 
}