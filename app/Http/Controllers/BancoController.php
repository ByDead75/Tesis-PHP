<?php

namespace App\Http\Controllers;
use App\Models\Bancos;


class BancoController extends Controller
{
    public function index ()
    {
        $bancos_model = new Bancos;

        $bancos = $bancos_model->get_bancos();

        return view('listado_bancos',  ['bancos' => $bancos]);

    } 

}
