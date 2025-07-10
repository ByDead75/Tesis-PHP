<?php

namespace App\Http\Controllers;
use App\Models\Gerencia;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GerenciasController extends Controller
{
    public function MostrarGerencias () {

    return view('gestiones.gerencias.mostrar_gerencia');
    }

    public function DataGerencia (Request $request) {

        if ($request->ajax()) {
            
            $gerencias_model = new Gerencia;
            $gerencias = $gerencias_model->get_gerencias($request->codigo_empresa, 
                                                        $request->codigo_direccion, 
                                                        $request->codigo_gerencia, 
                                                        $request->nombre_empresa, 
                                                        $request->nombre_direccion, 
                                                        $request->nombre_gerencia);
                                                            

            $datatables = DataTables::of($gerencias)
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    $button = '<div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-secondary icon" onclick="RedireccionEditarSucursal('.$row->cod_empresa.',
                                                                                                                    '.$row->cod_direccion.',
                                                                                                                    '.$row->cod_gerencia.') "title="Clic para editar">
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

    public function MostrarAgregarGerencias () {


        return view('gestiones.gerencias.agregar_gerencia');
    }

    public function AgregarGerencias (Request $request) {

        $request->validate([
        'empresa_codigo' => 'required',
        'direccion_codigo' => 'required',
        'gerencia_codigo' => 'required',
        'gerencia' => 'required',
        ]);

        try {

        $gerencia = new Gerencia();

        $gerencia->cod_empresa = $request->input('empresa_codigo');
        $gerencia->cod_direccion = $request->input('direccion_codigo');
        $gerencia->cod_gerencia = $request->input('gerencia_codigo');
        $gerenciaNombre = $request->input('gerencia');
        $gerencia->nb_gerencia = strtoupper(trim(preg_replace('/\s+/', ' ', $gerenciaNombre)));
        $gerencia->save();

            return redirect()->route('gestiones.gerencias.registros');
        } catch (\Exception $e) {
            
            return back()->withErrors(['error' => 'Ocurrió un error al guardar los datos.']);
        }

    }

    public function EditarGerencias () {

    return view('');
    }

    public function EditarGerenciaSeleccionada () {

    return view('gestiones.gerencias.editar_gerencia');
    }

    public function BuscarGerenciasDireccion (Request $request)
    {

        if ($request->ajax()) {
            $gerencia_direccion_model = new Gerencia;
            $gerencia_direccion = $gerencia_direccion_model->get_gerencia_direccion($request->codigo_empresa,
                                                                                    $request->codigo_direccion);

            return response()->json($gerencia_direccion);
        }

    } 

}
