<?php

namespace App\Http\Controllers;

use App\Models\CentrosDeCosto;
use App\Models\Bancos;

class CentrosDeCostoController extends Controller
{

    public function index ()
    {
        $centros_de_costo_model = new CentrosDeCosto;
        $bancos_model = new Bancos;

        $centros = $centros_de_costo_model->get_centros();
        $bancos = $bancos_model->get_bancos();

        return view('listado_bancos',  ['centros' => $centros, 'bancos' => $bancos]);

    } 
}
