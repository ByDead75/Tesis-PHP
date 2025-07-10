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
                                    <a class="btn btn-sm btn-secondary icon" onclick="RedireccionEditarDepartamento('.$row->cod_departamento.') "title="Clic para editar">
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
        'departamento' => 'required',
    ]);

        // Obtener el último código de departamento
        $ultimoDepartamento = Departamento::orderBy('cod_departamento', 'desc')->first();
        $nuevoCodDepartamento = $ultimoDepartamento ? $ultimoDepartamento->cod_departamento + 1 : 1;

        try {

        $departamento = new Departamento();

        $departamento->cod_empresa = $request->input('empresa_codigo');
        $departamento->cod_direccion = $request->input('direccion_codigo');
        $departamento->cod_gerencia = $request->input('gerencia_codigo');
        $departamento->cod_departamento = $nuevoCodDepartamento;

        $departamentoNombre = $request->input('departamento');
        $departamento->nb_departamento = strtoupper(trim(preg_replace('/\s+/', ' ', $departamentoNombre)));
        $departamento->NB_ALTERNO = ' ';
        $departamento->fecha_inactivacion = null;
        $departamento->save();

            return redirect()->route('gestiones.departamentos.registros.obtener');
        } catch (\Exception $e) {
            
            return back()->withErrors(['error' => 'Ocurrió un error al guardar los datos.']);
        }
    }

    public function EditarDepartamentoSeleccionado (Request $request, $cod_departamento) {

        $departamento_model = new Departamento;
        $departamento = $departamento_model->GetDepartamentoPorCodigo($cod_departamento);

        if (!$departamento) {
            abort(404, 'Departamento no encontrado');
        }

    return view('gestiones.departamentos.editar_departamento', compact('departamento'));
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