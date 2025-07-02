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
use Illuminate\Support\Facades\Log;

class OrdenesController extends Controller
{

    public function MostrarCrearSolicitud()
    {

        $usuario = Auth::guard('usuarios')->user();

    $empresa_model = new Empresa;
    $empresas = $empresa_model->get_empresas();

    return view('ordenes.crear_solicitud', [
        'nombre' => $usuario->nombre,
        'cedula'=> $usuario->cedula,
        'empresas' => $empresas,
        ]);
    }

    public function GuardarSolicitud(Request $request){

        $request->validate([
            /*
            'fecha_solicitud'   => 'required|date',
            'cod_empresa'   => 'required|int',
            'centro_de_costo' => 'required|int',
            'id_solicitante' => 'required|int',*/
            'concepto_de_pago' => 'nullable|string|max:500',
            /*
            'beneficiario_de_pago' => 'nullable|string|max:500',
            'id_pago' => 'required|int',
            'id_banco' => 'required|int',          
            'cuenta' => 'nullable|string|max:20',
            'factura' => 'nullable|string|max:10',
            'n_control' => 'nullable|string|max:10',
            'monto' => 'required|numeric|regex:/^\d{1,28}(\.\d{1,2})?$/',
            'monto_iva' => 'nullable|numeric|regex:/^\d{1,28}(\.\d{1,2})?$/',
            'monto_total' => 'required|numeric|regex:/^\d{1,63}(\.\d{1,2})?$/',
            'rif' => 'nullable|string|max:20',
            'cod_sucursal'   => 'required|int',
            'factupuesto' => 'required|int',
            'aprobador_sol' => 'required|int',
            'TipoProveedor' => 'nullable|string|max:20',
            
            'cod_departamento' => 'required|int',
            'observaciones' => 'nullable|string|max:500',
            'status_solicitud' => 'required|int',
            'cod_direccion'   => 'required|int',
            */
        ]);
        

        $solicitud = new Solicitudes();

        $solicitud->fecha_solicitud = $request->input('fecha_solicitud');
        $solicitud->cod_empresa = $request->input('empresa_codigo');
        $solicitud->centro_de_costo = $request->input('centro_costo_empresa_codigo'); 
        $solicitud->id_solicitante = $request->input('id_solicitante');
        $solicitud->cod_departamento = 0;
        $solicitud->concepto_de_pago = $request->input('concepto_de_pago');
        $solicitud->beneficiario_de_pago = $request->input('proveedor_codigo'); 
        $solicitud->id_pago = $request->input('forma_pago'); 
        $solicitud->id_banco = $request->input('proveedor_banco_codigo');
        $solicitud->cuenta = $request->input('proveedor_numero_cuenta'); 
        $solicitud->factura = $request->input('numero_tipo_solicitud'); 
        $solicitud->n_control = $request->input('numero_control'); 
        $solicitud->monto = $request->input('monto_neto');
        $solicitud->monto_iva = $request->input('monto_iva');
        $solicitud->monto_total = $request->input('monto_total');
        $solicitud->observaciones = "";
        $solicitud->status_solicitud = 1;
        $solicitud->rif = $request->input('proveedor_rif');
        $solicitud->cod_sucursal= $request->input('sucursal_codigo');
        $solicitud->cod_direccion = 0;  
        $solicitud->TipoProveedor= $request->input('tipo_proveedor'); 
        $solicitud->firma = 0;
        $solicitud->factupuesto = $request->input('tipo_solicitud');   
        $solicitud->imagen = " ";
        $solicitud->firma_1 = 0;
        $solicitud->firma_2 = 0;
        $solicitud->firma_3 = 0;
        $solicitud->aprobador_sol= $request->input('aprobador_codigo');
        $solicitud->firma_4 = 0;

        $solicitud->save();

        return redirect()->route('historial.index')
        ->with('success', 'Solicitud actualizada correctamente!');
    }




    // Funciones de Editar

    public function MostrarIndexEditarSolicitudes ()
    {
        return view('ordenes.index_editar_solicitudes');
    }


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


    public function ActualizarSolicitudSeleccionada(Request $request, $id_solicitud){
        $request->validate([
            
            'concepto_de_pago' => 'nullable|string|max:500',
            /*
            'cuenta' => 'required|string|max:30',
            'factura' => 'required|string|max:20',
            'n_control' => 'required|string|max:10',
            'rif'               => 'required|string|max:20',
            'monto'        => 'required|string|max:20',
            'monto_iva'       => 'required|numeric|min:0',
            'fecha_solicitud'   => 'required|date',
            */
        ]);

        $solicitudes_model = new Solicitudes;
        $solicitud = $solicitudes_model->GetSolicitudesPorId($id_solicitud);

        Log::info($request->all());

        $fecha_solicitud_actual = $solicitud->fecha_solicitud; 

        $cod_departamento_actual = $solicitud->cod_departamento;
        $observaciones_actual = $solicitud->observaciones;
        $status_solicitud_actual = $solicitud->status_solicitud;

        $cod_direccion_actual = $solicitud->cod_direccion;  
        $firma_actual = $solicitud->firma;
        $fecha_firma_1_actual = $solicitud->fecha_firma_1;
        $fecha_firma_2_actual = $solicitud->fecha_firma_2;
        $fecha_firma_3_actual = $solicitud->fecha_firma_3;

        $imagen_actual =  $solicitud->imagen;

        $firma_1_actual = $solicitud->firma_1;
        $firma_2_actual = $solicitud->firma_2;
        $firma_3_actual = $solicitud->firma_3;

        $fecha_firma_4_actual = $solicitud->fecha_firma_4;
        $firma_4_actual = $solicitud->firma_4;

        $solicitud->fecha_solicitud = $request->input('fecha_solicitud');
        //$solicitud->fecha_solicitud = $fecha_solicitud_actual;

        $solicitud->cod_empresa = $request->input('empresa_codigo');
        $solicitud->centro_de_costo = $request->input('centro_costo_empresa_codigo'); 
        $solicitud->id_solicitante = $request->input('id_solicitante');

        $solicitud->cod_departamento = $cod_departamento_actual;

        $solicitud->concepto_de_pago = $request->input('concepto_de_pago');

        $solicitud->beneficiario_de_pago = $request->input('proveedor_codigo'); 
        $solicitud->id_pago = $request->input('forma_pago'); 
        $solicitud->id_banco = $request->input('proveedor_banco_codigo');
        $solicitud->cuenta = $request->input('proveedor_numero_cuenta'); 
        $solicitud->factura = $request->input('numero_tipo_solicitud'); 
        $solicitud->n_control = $request->input('numero_control'); 
        $solicitud->monto = $request->input('monto_neto');
        $solicitud->monto_iva = $request->input('monto_iva');
        $solicitud->monto_total = $request->input('monto_total');

        $solicitud->observaciones = $observaciones_actual;
        $solicitud->status_solicitud = $status_solicitud_actual;

        $solicitud->rif = $request->input('proveedor_rif');
        $solicitud->cod_sucursal= $request->input('sucursal_codigo');

        $solicitud->cod_direccion = $cod_direccion_actual;  
        $solicitud->firma = $firma_actual;
        $solicitud->fecha_firma_1 = $fecha_firma_1_actual;
        $solicitud->fecha_firma_2 = $fecha_firma_2_actual;
        $solicitud->fecha_firma_3 = $fecha_firma_3_actual;

        $solicitud->factupuesto = $request->input('tipo_solicitud');   
        
        $solicitud->imagen = $imagen_actual;

        $solicitud->aprobador_sol= $request->input('aprobador_codigo');

        $solicitud->firma_1 = $firma_1_actual;
        $solicitud->firma_2 = $firma_2_actual;
        $solicitud->firma_3 = $firma_3_actual;

        $solicitud->TipoProveedor= $request->input('tipo_proveedor'); 
        
        $solicitud->fecha_firma_4 = $fecha_firma_4_actual;
        $solicitud->firma_4 = $firma_4_actual;

        $solicitud->save();

        return redirect()->route('ordenes.solicitud.registros')
        ->with('success', 'Solicitud actualizada correctamente!');
    }
    
}
