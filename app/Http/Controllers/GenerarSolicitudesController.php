<?php

namespace App\Http\Controllers;

use App\Models\CentrosDeCosto;
use App\Models\Proveedores;
use App\Models\Empresa;
use App\Models\Cuentas;
use App\Models\Bancos;

class GenerarSolicitudesController extends Controller
{

    public function index ()
    {
        $empresa_model = new Empresa;
        $centros_de_costo_model = new CentrosDeCosto;
        $bancos_model = new Bancos;
        $cuentas_model = new Cuentas;

        $empresas = $empresa_model->get_empresas();
        $centros = $centros_de_costo_model->get_centros();
        $bancos = $bancos_model->get_bancos();
        $cuentas = $cuentas_model->get_cuentas();

        return view('ordenes.generar_solicitud',   [
        'centros' => $centros, 
        'bancos' => $bancos, 
        'empresas' => $empresas,
        'cuentas' => $cuentas,
        ]);
    } 
}
