<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class DireccionesController extends Controller
{
    public function MostrarIndexDirecciones () {

    return view('gestiones.direcciones.mostrar_direccion');
    }

    public function DataDireccion (Request $request) {

        if ($request->ajax()) {
            
            $direccion_model = new Direccion;
            $direccion = $direccion_model->obtener_direcciones($request->cod_empresa,
                                                        $request->nb_empresa,
                                                        $request->cod_direccion,
                                                        $request->nb_direccion,
                                                        );
            $datatables = DataTables::of($direccion)
            ->addIndexColumn()
            ->addColumn('actions', function($row) {
                    $button = '<div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-secondary icon" onclick="RedireccionEditarDireccion('.$row->cod_empresa.','.$row->cod_direccion.') "title="Clic para editar">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                </div>';
                    return $button;
                })
            ->rawColumns(['actions'])
            ->make(true);
            return $datatables;
        }
    }

    public function MostrarAgregarDirecciones () {

    return view('gestiones.direcciones.agregar_direccion');
    }

    public function AgregarDirecciones (Request $request) {

    $request->validate([
        'empresa_codigo' => 'required',
        'direccion_codigo' => 'required',
        'direccion' => 'required',
    ]);

        $direccion = new Direccion();

        $direccion->cod_empresa = $request->input('empresa_codigo');
        $direccion->cod_direccion = $request->input('direccion_codigo');

        $direccionNombre = $request->input('direccion');
        $direccion->nb_direccion = strtoupper(trim(preg_replace('/\s+/', ' ', $direccionNombre)));
        $direccion->fecha_inactivacion = null;
        $direccion->save();

        return redirect()->route('gestiones.direcciones.registros.obtener');
    }

    public function EditarDireccionSeleccionada (Request $request, $codigo_empresa, $codigo_direccion) {

        $direccion_model = new Direccion;
        $direccion = $direccion_model->GetDireccionPorCodigo($codigo_empresa, $codigo_direccion);

        if (!$direccion) {
            abort(404, 'Direccion no encontrada');
        }

    return view('gestiones.direcciones.editar_direccion', compact('direccion'));
    }

    public function ActualizarDireccionSeleccionada (Request $request) {

        $direccionNombre = $request->input('nb_direccion');
        $direccionNombreVerificado = strtoupper(trim(preg_replace('/\s+/', ' ', $direccionNombre)));

        
        if ($request->input('empresa_codigo') !== null) {
                $codigo_empresa = $request->input('empresa_codigo');
            } else {
                $codigo_empresa = $request->input('empresa_codigo_viejo');
            }
        if ($request->input('direccion_codigo') !== null) {
                $codigo_direccion = $request->input('direccion_codigo');
            } else {
                $codigo_direccion = $request->input('direccion_codigo_viejo');
            }

        $direccion = Direccion::where('cod_empresa', $request->input('empresa_codigo_viejo'))
        ->where('cod_direccion', $request->input('direccion_codigo_viejo'))
        ->update([ 'cod_empresa' => $codigo_empresa,
                    'cod_direccion' => $codigo_direccion,
                    'nb_direccion' => $direccionNombreVerificado]);

        return redirect()->route('gestiones.direcciones.registros.obtener');

    }
    
    public function BuscarDireccionEmpresa (Request $request)
    {

        if ($request->ajax()) {
            $direccion_empresa_model = new Direccion;
            $direccion_empresa = $direccion_empresa_model->get_direccion_empresas($request->codigo_empresa);

            return response()->json($direccion_empresa);
        }

    } 

}
