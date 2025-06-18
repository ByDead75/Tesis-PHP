<?php

namespace App\Http\Controllers;

use App\Models\CentroCosto;
use App\Models\Empleados1;
use App\Models\Sucursales;
use App\Models\Empresa;
use App\Models\Proveedores;

class OrdenesController extends Controller
{

    public function get_cargar_solicitud ()
    {
        $empleados1_model = new Empleados1;
        $empresa_model = new Empresa;
        $centro_costo_model = new CentroCosto;
        $sucursales_model = new Sucursales;

        $empleados1 = $empleados1_model->get_empleados1();
        $empresas = $empresa_model->get_empresas();
        $centro_costo = $centro_costo_model->get_centro_costo();
        $sucursales = $sucursales_model->get_sucursales();

        return view('ordenes.generar_solicitud',   [
        'centro' => $centro_costo,
        'empleados1' => $empleados1,
        'empresas' => $empresas,
        'sucursales' => $sucursales,
        ]);
    } 
}
