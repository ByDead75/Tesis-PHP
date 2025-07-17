<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empresa;
use App\Models\Direccion;
use App\Models\Gerencia;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class DepartamentosController extends Controller {

    public function MostrarIndexDepartamentos () {

    return view('gestiones.departamentos.mostrar_departamento');
    }

    public function DataDepartamento (Request $request) {

        if ($request->ajax()) {
            
            $departamento_model = new Departamento;
            $departamento = $departamento_model->obtener_departamentos($request->cod_empresa,
                                                            $request->cod_direccion,
                                                            $request->cod_gerencia, 
                                                            $request->cod_departamento,
                                                            $request->nb_departamento,
                                                            );
            $datatables = DataTables::of($departamento)
            ->addIndexColumn()
            ->addColumn('actions', function($row) {
                    $button = '<div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-secondary icon" onclick="RedireccionEditarDepartamento('.$row->cod_empresa.',
                                                                                                                    '.$row->cod_direccion.',
                                                                                                                    '.$row->cod_gerencia.',
                                                                                                                    '.$row->cod_departamento.',) "title="Clic para editar">
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

    public function MostrarAgregarDepartamentos () {

    return view('gestiones.departamentos.agregar_departamento');
    }

    public function AgregarDepartamentos(Request $request) {

    $request->validate([
        'empresa_codigo' => 'required',
        'direccion_codigo' => 'required',
        'gerencia_codigo' => 'required',
        'cod_departamento' => 'required',
        'departamento' => 'required',
    ]);

        try {

        $departamento = new Departamento();

        $departamento->cod_empresa = $request->input('empresa_codigo');
        $departamento->cod_direccion = $request->input('direccion_codigo');
        $departamento->cod_gerencia = $request->input('gerencia_codigo');
        $departamento->cod_departamento = $request->input('cod_departamento');

        $departamentoNombre = $request->input('departamento');
        $departamento->nb_departamento = strtoupper(trim(preg_replace('/\s+/', ' ', $departamentoNombre)));
        $departamento->NB_ALTERNO = ' ';
        $departamento->fecha_inactivacion = null;
        $departamento->save();

            return redirect()->route('gestiones.departamentos.registros.obtener')
                                    ->with('success', 'Departamento creado con exito.');
        } catch (\Exception $e) {
            
            return back()->withErrors(['error' => 'Ocurrió un error al guardar los datos.']);
        }
    }

    public function EditarDepartamentoSeleccionado (Request $request, $cod_empresa, $cod_direccion, 
                                                                        $cod_gerencia, $cod_departamento) {

        $departamento_model = new Departamento;
        $departamento = $departamento_model->GetDepartamentoPorCodigo($cod_empresa, $cod_direccion, 
                                                                        $cod_gerencia, $cod_departamento);

        if (!$departamento) {
            abort(404, 'Departamento no encontrado');
        }

    return view('gestiones.departamentos.editar_departamento', compact('departamento'));
    } 

    public function ActualizarDepartamentoSeleccionado (Request $request) {

        try {

            $departamentoNombre = $request->input('departamento');
            $departamentoNombreVerificado = strtoupper(trim(preg_replace('/\s+/', ' ', $departamentoNombre)));

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

            if ($request->input('cod_departamento') !== null) {
                
                $codigo_departamento = $request->input('cod_departamento');
            } else {
                $codigo_departamento = $request->input('departamento_codigo_viejo');
            }

            $departamento = Departamento::where('cod_empresa', $request->input('empresa_codigo_viejo'))
            ->where('cod_direccion', $request->input('direccion_codigo_viejo'))
            ->where('cod_gerencia', $request->input('gerencia_codigo_viejo'))
            ->where('cod_departamento', $request->input('departamento_codigo_viejo'))
            ->update([ 'cod_empresa' => $codigo_empresa,
                        'cod_direccion' => $codigo_direccion,
                        'cod_gerencia' => $codigo_gerencia,
                        'cod_departamento' => $codigo_departamento,
                        'nb_departamento' => $departamentoNombreVerificado]);

            if (!$departamento) {
                abort(404, 'Departamento no encontrado');
            }

                return redirect()->route('gestiones.departamentos.registros.obtener')
                                        ->with('success', 'Departamento actualizado con exito.');

        } catch (\Exception $e) {
            
            return back()->withErrors(['error' => 'Ocurrió un error al guardar los datos.']);
        }

    }

    public function BuscarDepartamentoGerencia (Request $request)
    {

        if ($request->ajax()) {
            $departamento_gerencia_model = new Departamento;
            $departamento_gerencia = $departamento_gerencia_model->get_departamento_gerencia(
                                                                                    $request->codigo_empresa,
                                                                                    $request->codigo_direccion,
                                                                                    $request->codigo_gerencia);
            return response()->json($departamento_gerencia);
        }

    } 
}