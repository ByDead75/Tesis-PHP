<?php

namespace App\Http\Controllers;

use App\Models\Cuentas;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class CuentasController extends Controller
{
    public function BuscarCuentasProveedores (Request $request)
    {
        if ($request->ajax()) {
       
            $cuentas_proveedores_model = new Cuentas;
            $cuentas_proveedores = $cuentas_proveedores_model->get_cuentas_proveedor($request->codigo_proveedor);

            return response()->json($cuentas_proveedores);
        }

    } 
}