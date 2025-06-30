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
use Illuminate\Support\Facades\Auth;

class OrdenesController extends Controller
{

    public function MostrarCrearSolicitud(Request $request)
    {

        $usuario = Auth::guard('usuarios')->user();

    $empresa_model = new Empresa;
    $empresas = $empresa_model->get_empresas();

    return view('ordenes.crear_solicitud', [
        'nombre' => $usuario->nombre,
        'empresas' => $empresas,
        ]);
    }


    // Funciones de Editar

    public function MostrarIndexEditarSolicitudes ()
    {
        return view('ordenes.index_editar_solicitudes');
    }


    /*
    public function EditarSolicitud(Solicitud $solicitud)
    {
        return view('solicitudes.edit', compact('solicitud'));
    }

    public function ActualizarSolicitud(Request $request, Solicitud $solicitud){
        $request->validate([
            
            'concepto_pago' => 'nullable|string|max:500',
            'cuenta' => 'required|string|max:30',
            'factura' => 'required|string|max:20',
            'n_control' => 'required|string|max:10',
            'rif'               => 'required|string|max:20',
            'monto'        => 'required|string|max:20',
            'monto_iva'       => 'required|numeric|min:0',
            'fecha_solicitud'   => 'required|date',
        ]);

        $solicitud->concepto_pago = $request->input('concepto_pago');
        $solicitud->rif = $request->input('rif');
        $solicitud->monto_total = $request->input('monto_total');
        $solicitud->fecha_solicitud = $request->input('fecha_solicitud');
        $solicitud->descripcion = $request->input('descripcion');

        $solicitud->save();

        return redirect()->route('historial.index')
        ->with('success', 'Solicitud actualizada correctamente!');
    }
    */

    public function RegistrosEditarSolicitudes (Request $request)
    {

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
                    //$editarUrl = route('ordenes.solicitud.actualizar', $row->id);
                    $button = '<div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-secondary icon"  onclick="RedireccionEditarSolicitud('.$row->id_solicitud.') "title="Clic para editar">
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


    public function EditarSolicitudSeleccionada(Request $request, $id_solicitud) 
    {   
        
        $solicitudes_model = new Solicitudes;
        $solicitud = $solicitudes_model->GetSolicitudesPorId($id_solicitud);

        $empresa_model = new Empresa;
        $empresas = $empresa_model->get_empresas();

        if (!$solicitud) {
            abort(404, 'Solicitud de pago no encontrada.');
        }

        return view('ordenes.editar_solicitud', compact('solicitud', 'empresas'));

        
    }
}
