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
                                    <a class="btn btn-sm btn-secondary icon" onclick="RedireccionEditarDireccion('.$row->cod_direccion.') "title="Clic para editar">
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

        $direccion->save();

        return redirect()->route('gestiones.direcciones.registros.obtener');
    }

    public function EditarDireccionSeleccionada (Request $request, $cod_direccion) {

        $direccion_model = new Direccion;
        $direccion = $direccion_model->GetDireccionPorCodigo($cod_direccion);

        if (!$direccion) {
            abort(404, 'Direccion no encontrada');
        }

    return view('gestiones.direcciones.editar_direccion', compact('direccion'));
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
