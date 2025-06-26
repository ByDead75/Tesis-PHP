<?php

namespace App\Http\Controllers;

use App\Models\CentroCosto;
use Illuminate\Http\Request;

class CentroCostoController extends Controller {

    public function BuscarCentroCostoGerencia (Request $request)
    {

        if ($request->ajax()) {
            $centro_costo_gerencia_model = new CentroCosto;
            $centro_costo_gerencia = $centro_costo_gerencia_model->get_centro_costo_gerencia(
                                                                                    $request->codigo_empresa,
                                                                                    $request->codigo_gerencia);
            return response()->json($centro_costo_gerencia);
        }

    } 
}