<?php

namespace App\Http\Controllers;
use App\Models\Bancos;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    public function index (Request $request)
    {

        if ($request->ajax()) {
            $bancos_model = new Bancos;
            $bancos = $bancos_model->get_bancos();

            return response()->json($bancos);
        }

    } 

}
