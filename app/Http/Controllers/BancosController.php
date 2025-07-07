<?php

namespace App\Http\Controllers;
use App\Models\Bancos;
use Illuminate\Http\Request;

class BancosController extends Controller
{
    public function index (Request $request)
    {

        if ($request->ajax()) {
            $bancos_model = new Bancos;
            $bancos = $bancos_model->get_bancos();

            return response()->json($bancos);
        }

    }
    public function BuscarBancos (Request $request)
    {
        if ($request->ajax()) {
            $bancos_registrar_model = new Bancos;
            $bancos_registrar = $bancos_registrar_model->get_agregar_banco();

            return response()->json($bancos_registrar);
        }
    }

}
