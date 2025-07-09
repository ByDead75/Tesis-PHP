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
use App\Services\DocumentoService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Documento;
use Illuminate\Support\Facades\Storage;

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
            'fecha_solicitud'   => 'required|date',
            'empresa_codigo'   => 'required|int',
            'centro_costo_empresa_codigo' => 'required|int',
            'id_solicitante' => 'required|int',
            'concepto_de_pago' => 'required|string|max:500',
            'proveedor_codigo' => 'required|string|max:500',
            'forma_pago' => 'required|int',
            'proveedor_banco_codigo' => 'required|int',         
            'proveedor_numero_cuenta' => 'required|string|max:20',
            'numero_tipo_solicitud' => 'required|string|max:10',
            'numero_control' => 'required|string|max:20',
            'monto_neto' => 'required|numeric|regex:/^\d{1,28}(\.\d{1,2})?$/',
            'monto_iva' => 'required|numeric|regex:/^\d{1,28}(\.\d{1,2})?$/',
            'monto_total' => 'required|numeric|regex:/^\d{1,63}(\.\d{1,2})?$/',
            'proveedor_rif' => 'required|string|max:20',
            'sucursal_codigo'   => 'required|int',
            'tipo_solicitud' => 'required|int',
            'aprobador_codigo' => 'required|int',
            'tipo_proveedor' => 'required|string|max:20',
        ]);
        
        //Log::info($request->all());
        //local.INFO: array

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

        
        foreach($request->get('archivos') as $archivo){

            if ($archivo !== null && !empty($archivo)) {

                $ultimoDocumento = Documento::orderby('id', 'desc')->first();
                $nuevoIdDocumento = $ultimoDocumento ? $ultimoDocumento->id + 1 : 1;

                $nombre_archivo = $solicitud->id_solicitud . 'datosSolicitud_' . ($nuevoIdDocumento) . '.' . pathinfo($archivo, PATHINFO_EXTENSION);

                DocumentoService::copiar('public/temp/'.$archivo, 'public/documentos/'.$nombre_archivo);

                DocumentoService::guardar([
                        'nombre_documento' => $nombre_archivo,
                        'id_factura' => $solicitud->id_solicitud,
                        'id_usuario' => $solicitud->id_solicitante,
                        'tipo_documento' => 1,
                        'fecha_registro' => $solicitud->fecha_solicitud,
                        'ruta' => 'storage/documentos/',
                        'observacion' => '',
                    ]);

                DocumentoService::eliminar('public/temp/'.$archivo);
            }
        }

        

        return redirect()->route('historial.index');
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

        $documento_model = new Documento;
        $documentos = $documento_model->GetDocumentoPorId($id_solicitud);


        if (!$solicitud) {
            abort(404, 'Solicitud de pago no encontrada.');
        }

        return view('ordenes.editar_solicitud', compact('solicitud', 'empresas', 'documentos'));

        
    }


    public function ActualizarSolicitudSeleccionada(Request $request, $id_solicitud){

        $request->validate([
            'fecha_solicitud'   => 'required|date',
            'empresa_codigo'   => 'required|int',
            'centro_costo_empresa_codigo' => 'required|int',
            'id_solicitante' => 'required|int',
            'concepto_de_pago' => 'required|string|max:500',
            'proveedor_codigo' => 'required|string|max:500',
            'forma_pago' => 'required|int',
            'proveedor_banco_codigo' => 'required|int',         
            'proveedor_numero_cuenta' => 'required|string|max:20',
            'numero_tipo_solicitud' => 'required|string|max:10',
            'numero_control' => 'required|string|max:20',
            'monto_neto' => 'required|numeric|regex:/^\d{1,28}(\.\d{1,2})?$/',
            'monto_iva' => 'required|numeric|regex:/^\d{1,28}(\.\d{1,2})?$/',
            'monto_total' => 'required|numeric|regex:/^\d{1,63}(\.\d{1,2})?$/',
            'proveedor_rif' => 'required|string|max:20',
            'sucursal_codigo'   => 'required|int',
            'tipo_solicitud' => 'required|int',
            'aprobador_codigo' => 'required|int',
            'tipo_proveedor' => 'required|string|max:20',
        ]);

        $solicitudes_model = new Solicitudes;
        $solicitud = $solicitudes_model->GetSolicitudesPorId($id_solicitud);

        

        $solicitud->fecha_solicitud = $request->input('fecha_solicitud');
        //$solicitud->fecha_solicitud = $fecha_solicitud_actual;

        $solicitud->cod_empresa = $request->input('empresa_codigo');
        $solicitud->centro_de_costo = $request->input('centro_costo_empresa_codigo'); 
        $solicitud->id_solicitante = $request->input('id_solicitante');


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


        $solicitud->rif = $request->input('proveedor_rif');
        $solicitud->cod_sucursal= $request->input('sucursal_codigo');
        $solicitud->factupuesto = $request->input('tipo_solicitud');   
        $solicitud->aprobador_sol= $request->input('aprobador_codigo');
        $solicitud->TipoProveedor= $request->input('tipo_proveedor'); 

        $solicitud->save();

        if ($request->get('archivos') !== null) {

            foreach($request->get('archivos') as $archivo){

                if ($archivo !== null && !empty($archivo)) {

                    $ultimoDocumento = Documento::orderby('id', 'desc')->first();
                    $nuevoIdDocumento = $ultimoDocumento ? $ultimoDocumento->id + 1 : 1;

                    $nombre_archivo = $solicitud->id_solicitud . 'datosSolicitud_' . ($nuevoIdDocumento) . '.' . pathinfo($archivo, PATHINFO_EXTENSION);
                        
                    DocumentoService::copiar('public/temp/'.$archivo, 'public/documentos/'.$nombre_archivo);

                    DocumentoService::guardar([
                            'nombre_documento' => $nombre_archivo,
                            'id_factura' => $solicitud->id_solicitud,
                            'id_usuario' => $solicitud->id_solicitante,
                            'tipo_documento' => 1,
                            'fecha_registro' => $solicitud->fecha_solicitud,
                            'ruta' => 'storage/documentos/',
                            'observacion' => '',
                        ]);

                    DocumentoService::eliminar('public/temp/'.$archivo);
                }
            }
        }

        

        return redirect()->route('ordenes.solicitud.registros');
    }
    
    // Funciones de Aprobar/Canbiar Status

    public function MostrarIndexStatusSolicitudes ()
    {
        return view('ordenes.index_status_solicitudes');
    }

    public function RegistrosStatusSolicitudes (Request $request)
    {

        if ($request->ajax()) {
            
            $solicitudes_model = new Solicitudes;
            $solicitudes = $solicitudes_model->get_solicitudes_por_aprobacion($request->id_solicitud, 
                                                                            $request->id_solicitante, 
                                                                            $request->fecha_desde,
                                                                            $request->fecha_hasta,
                                                            );

            $datatables = DataTables::of($solicitudes)
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    $button = '<div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-primary icon"  onclick="RedireccionStatusSolicitud('.$row->id_solicitud.') "title="Clic para modificar status">
                                        <i class="fas fa-edit"></i> 
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

    public function CambiarStatusSolicitud(Request $request, $id_solicitud) 
    {   
        
        $solicitudes_model = new Solicitudes;
        $solicitud = $solicitudes_model->GetSolicitudesPorId($id_solicitud);

        $documento_model = new Documento;
        $documentos = $documento_model->GetDocumentoPorId($id_solicitud);


        if (!$solicitud) {
            abort(404, 'Solicitud de pago no encontrada.');
        }

        return view('ordenes.status_solicitud', compact('solicitud', 'documentos'));

        
    }

    public function ActualizarStatusSolicitud(Request $request, $id_solicitud) 
    {   
        
        $solicitudes_model = new Solicitudes;
        $solicitud = $solicitudes_model->GetSolicitudesPorId($id_solicitud);


        $observaciones_actual = $solicitud->observaciones;
        
        $solicitud->status_solicitud = $request->input('status_solicitud');

        if ($solicitud->status_solicitud != 3) {
            $solicitud->observaciones = $observaciones_actual;
        } else {
            $solicitud->observaciones = $request->input('observaciones');
        }

        $solicitud->save();

        return redirect()->route('ordenes.solicitud.status');

    }
}
