<?php

namespace App\Http\Controllers;
use App\Models\Sucursales;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    public function BuscarSucursalesEmpresa (Request $request)
    {

        if ($request->ajax()) {
            $sucursales_empresa_model = new Sucursales;
            $sucursales_empresa = $sucursales_empresa_model->get_sucursales_empresas($request->codigo_empresa);

            return response()->json($sucursales_empresa);
        }

    } 

}
