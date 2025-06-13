<?php

namespace App\Http\Controllers;

use App\Models\Solicitudes;
use App\Models\Empleados1;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HistorialController extends Controller
{

    public function index ()
    {
        return view('historial.index');
    }

    public function registros_historial (Request $request) {

<<<<<<< Updated upstream
        if ($request->ajax()) {
            
            $solicitudes_model = new Solicitudes;
            $solicitudes = $solicitudes_model->get_solicitudes();
=======

        //Este comando indica la cantidad de paginación que se le asigna a la tabla

        $solicitudes = Solicitudes::paginate(25);
>>>>>>> Stashed changes

            $datatables = DataTables::of($solicitudes)
                ->addIndexColumn()
                // ->addColumn('fecha_solicitud', function ($row) {
                //     return $row->fecha_solicitud ? $row->fecha_solicitud->strtotime('d/m/Y') : '';
                // })
                ->make(true);

            return $datatables;
        }
        
    }
}
