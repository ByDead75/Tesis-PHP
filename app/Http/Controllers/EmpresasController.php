<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Yajra\DataTables\DataTables;
use Illuminate\Contracts\Support\Jsonable;
use Nette\Utils\Json;
use Illuminate\Support\Facades\Validator;

class EmpresasController extends Controller
{
    public function MostrarIndexEmpresas () {

    return view('gestiones.empresas.mostrar_empresa');
    }

    public function DataEmpresa (Request $request) {

        if ($request->ajax()) {
            
            $empresa_model = new Empresa;
            $empresa = $empresa_model->obtener_empresas($request->cod_empresa,
                                                        $request->nb_empresa,
                                                        );
            $datatables = DataTables::of($empresa)
            ->addIndexColumn()
            ->addColumn('actions', function($row) {
                    $button = '<div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-secondary icon" onclick="RedireccionEditarEmpresa('.$row->cod_empresa.') "title="Clic para editar">
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

    public function MostrarAgregarEmpresas () {

    return view('gestiones.empresas.agregar_empresa');
    }

    public function AgregarEmpresas (Request $request) {

    $request->validate([
        'cod_empresa' => 'required',
        'empresa' => 'required',
    ]);

    $validator = Validator::make($request->all(), [
            'cod_empresa' => 'required|unique:empresa',
            'empresa' => 'required',
        ], [
            'cod_empresa.unique' => 'El código de empresa ya está en uso.',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $empresa = new Empresa();

        $empresa->cod_empresa = $request->input('cod_empresa');

        $empresaNombre = $request->input('empresa');
        $empresa->nb_empresa = strtoupper(trim(preg_replace('/\s+/', ' ', $empresaNombre)));

        $empresa->logo_empresa = ' ';

        $empresa->save();

        return redirect()->route('gestiones.empresas.registros.obtener');
    }

    public function EditarEmpresaSeleccionada (Request $request, $codigo_empresa) {

        $empresa_model = new Empresa;
        $empresa = $empresa_model->GetEmpresaPorCodigo($codigo_empresa);

        if (!$empresa) {
            abort(404, 'Empresa no encontrada');
        }

    return view('gestiones.empresas.editar_empresa', compact('empresa'));
    }

    public function ActualizarEmpresaSeleccionada (Request $request) {

        try {

            $empresaNombre = $request->input('empresa');
            $empresaNombreVerificado = strtoupper(trim(preg_replace('/\s+/', ' ', $empresaNombre)));

            if ($request->input('empresa_codigo') !== null) {

                $codigo_empresa = $request->input('empresa_codigo');
            } else {
                $codigo_empresa = $request->input('empresa_codigo_viejo');
            }

            $empresa = Empresa::where('cod_empresa', $request->input('empresa_codigo_viejo'))
            ->update([ 'cod_empresa' => $codigo_empresa,
                        'nb_empresa' => $empresaNombreVerificado]);
            
            if (!$empresa) {
                abort(404, 'Empresa no encontrada');
            }

                return redirect()->route('gestiones.empresas.registros.obtener');

        } catch (\Exception $e) {
            
            return back()->withErrors(['error' => 'Ocurrió un error al guardar los datos.']);
        }

    }

    public function BuscarEmpresas (Request $request)
    {
        if ($request->ajax()) {
            $empresas_model = new Empresa;
            $empresas = $empresas_model->get_empresas();

            return response()->json($empresas);
        }
    } 
}