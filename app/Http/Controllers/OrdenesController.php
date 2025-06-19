<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Helpers\StatusHelper;

use App\Models\CentroCosto;
use App\Models\Empleados1;
use App\Models\Sucursales;
use App\Models\Empresa;
use App\Models\Proveedores;
use App\Models\Solicitudes;


class OrdenesController extends Controller
{

    public function MostrarCrearSolicitud ()
    {
        $empleados1_model = new Empleados1;
        $empresa_model = new Empresa;
        $centro_costo_model = new CentroCosto;
        $sucursales_model = new Sucursales;

        $empleados1 = $empleados1_model->get_empleados1();
        $empresas = $empresa_model->get_empresas();
        $centro_costo = $centro_costo_model->get_centro_costo();
        $sucursales = $sucursales_model->get_sucursales();

        return view('ordenes.crear_solicitud');
    } 

    // Funciones de Editar

    public function MostrarIndexEditarSolicitudes ()
    {
        return view('ordenes.index_editar_solicitudes');
    }

    public function RegistrosEditarSolicitudes (Request $request)
    {

        // incluir condicional para exlucir solicitudes en status "PAGADA"
        if ($request->ajax()) {
            
            $solicitudes_model = new Solicitudes;
            $solicitudes = $solicitudes_model->get_solicitudes($request->id_solicitud, 
                                                                $request->id_solicitante, 
                                                                $request->status_solicitud,
                                                                $request->fecha_desde,
                                                                $request->fecha_hasta,
                                                            );

            $datatables = DataTables::of($solicitudes)
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    $button = '<div class="btn-group btn-group-sm" role="group">
                                    <a class="btn btn-secondary icon"  onclick="RedireccionEditarSolicitud('.$row->id_solicitud.') "title="Clic para editar">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                </div>';
                    return $button;
                })
                ->addColumn('status_solicitud', function ($row) {
                    $td = '<span class="badge '.StatusHelper::getStatusColor($row->status_solicitud).'">'.StatusHelper::getStatus($row->status_solicitud).'</span>';
                    return $td;
                })
                ->rawColumns(['actions', 'status_solicitud'])
                ->make(true);

            return $datatables;
        }
        
    }

    public function MostrarSolicitudSeleccionada() 
    {

        return view('ordenes.editar_solicitud');
    }

    public function EditarSolicitudSeleccionada($id_solicitud) 
    {   
        $solicitud = Solicitudes::find($id_solicitud);

        return view('ordenes.editar_solicitud');
    }
}
