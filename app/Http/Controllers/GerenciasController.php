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
                                    <a class="btn btn-sm btn-secondary icon" onclick="RedireccionEditarGerencia('.$row->cod_empresa.',
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

            return redirect()->route('gestiones.gerencias.registros')
                                    ->with('success', 'Gerencia creada con exito.');
        } catch (\Exception $e) {
            
            return back()->withErrors(['error' => 'Ocurrió un error al guardar los datos.']);
        }
    }

    public function EditarGerenciaSeleccionada (Request $request, 
                                                        $codigo_empresa, 
                                                        $codigo_direccion, 
                                                        $codigo_gerencia) {

        $gerencias_model = new Gerencia;
        $gerencia = $gerencias_model->GetGerenciaPorId($codigo_empresa, $codigo_direccion, $codigo_gerencia); 

        if (!$gerencia) {
            abort(404, 'Gerencia no encontrada.');
        }
        
        return view('gestiones.gerencias.editar_gerencia', compact('gerencia'));
    }

    public function ActualizarGerenciaSeleccionada (Request $request) {

        try {

            $gerenciaNombre = $request->input('gerencia');
            $gerenciaNombreVerificado = strtoupper(trim(preg_replace('/\s+/', ' ', $gerenciaNombre)));
            
            
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

            if ($request->input('gerencia_codigo') !== null) {
                
                $codigo_gerencia = $request->input('gerencia_codigo');
            } else {
                $codigo_gerencia = $request->input('gerencia_codigo_viejo');
            }

            

            $gerencia = Gerencia::where('cod_empresa', $request->input('empresa_codigo_viejo'))
            ->where('cod_direccion', $request->input('direccion_codigo_viejo'))
            ->where('cod_gerencia', $request->input('gerencia_codigo_viejo'))
            ->update([ 'cod_empresa' => $codigo_empresa,
                        'cod_direccion' => $codigo_direccion,
                        'cod_gerencia' => $codigo_gerencia,
                        'nb_gerencia' => $gerenciaNombreVerificado]);

            if (!$gerencia) {
                abort(404, 'Gerencia no encontrada');
            }

                return redirect()->route('gestiones.gerencias.registros')
                                        ->with('success', 'Gerencia actualizada con exito.');

        } catch (\Exception $e) {
            
            return back()->withErrors(['error' => 'Ocurrió un error al guardar los datos.']);
        }

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
