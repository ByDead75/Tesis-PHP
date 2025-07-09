<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Yajra\DataTables\DataTables;
use Illuminate\Contracts\Support\Jsonable;
use Nette\Utils\Json;

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
        'nb_empresa' => 'required',
    ]);

        $empresa = new Empresa();

        $empresa->cod_empresa = $request->input('cod_empresa');
        $empresa->nb_empresa = $request->input('nb_empresa');
        $empresa->logo_empresa = ' ';

        $empresa->save();

        return redirect()->route('gestiones.empresas.registros.obtener');
    }

    public function EditarEmpresaSeleccionada (Request $request, $cod_empresa) {

        $empresa_model = new Empresa;
        $empresa = $empresa_model->GetEmpresaPorCodigo($cod_empresa);

        if (!$empresa) {
            abort(404, 'Empresa no encontrada');
        }

    return view('gestiones.empresas.editar_empresa', compact('empresa'));
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