<?php

namespace App\Http\Controllers;

use App\Models\Solicitudes;
use App\Models\Empleados1;

class HistorialController extends Controller
{

    public function index ()
    {
        $solicitudes_model = new Solicitudes;
        $empleados1_model = new Empleados1;

        $solicitudes = $solicitudes_model->get_solicitudes();
        $empleados = $empleados1_model->get_empleados1();

        return view('historial.historial', ['solicitudes' => $solicitudes, 'empleados' => $empleados]);
    } 
}
