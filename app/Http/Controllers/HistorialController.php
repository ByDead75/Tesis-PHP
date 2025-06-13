<?php

namespace App\Http\Controllers;

use App\Helpers\StatusHelper;
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

        if ($request->ajax()) {
            
            $solicitudes_model = new Solicitudes;
            $solicitudes = $solicitudes_model->get_solicitudes();

        //Este comando indica la cantidad de paginación que se le asigna a la tabla

        $solicitudes = Solicitudes::paginate(25);

            $datatables = DataTables::of($solicitudes)
                ->addIndexColumn()
                ->addColumn('status_solicitud', function ($row) {
                    $td = '<span class="badge '.StatusHelper::getStatusColor($row->status_solicitud).'">'.StatusHelper::getStatus($row->status_solicitud).'</span>';
                    return $td;
                })
                ->rawColumns(['status_solicitud'])
                ->make(true);

            return $datatables;
        }
        
    }
}
