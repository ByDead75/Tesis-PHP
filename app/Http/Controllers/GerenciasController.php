<?php

namespace App\Http\Controllers;
use App\Models\Gerencia;
use Illuminate\Http\Request;

class GerenciasController extends Controller
{
    public function BuscarGerenciasDireccion (Request $request)
    {

        if ($request->ajax()) {
            $gerencia_direccion_model = new Gerencia;
            $gerencia_direccion = $gerencia_direccion_model->get_gerencia_direccion($request->codigo_empresa,
                                                                                    $request->codigo_direccion);

            return response()->json($gerencia_direccion);
        }

    } 

}
