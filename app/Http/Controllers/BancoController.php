<?php

namespace App\Http\Controllers;
use App\Models\Bancos;

class BancoController extends Controller
{
    public function index ()
    {
        $bancos_model = new Bancos;

        $bancos = $bancos_model->get_bancos();

        dd($bancos);

    } 
}
