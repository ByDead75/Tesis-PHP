<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    public function BuscarDireccionEmpresa (Request $request)
    {

        if ($request->ajax()) {
            $direccion_empresa_model = new Direccion;
            $direccion_empresa = $direccion_empresa_model->get_direccion_empresas($request->codigo_empresa);

            return response()->json($direccion_empresa);
        }

    } 

}
