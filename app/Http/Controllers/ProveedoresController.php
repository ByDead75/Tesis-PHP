<?php

namespace App\Http\Controllers;
use App\Helpers\TipoProveedorHelper;
use App\Models\Proveedores;
use Yajra\DataTables\DataTables;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class ProveedoresController extends Controller
{
    public function MostrarIndexProveedores () {

    return view('gestiones.proveedores.mostrar_proveedor');
    }

    public function DataProveedor (Request $request) {

        if ($request->ajax()) {
            
            $proveedores_model = new Proveedores;
            $proveedores = $proveedores_model->obtener_proveedores($request->cod_tipo_auxiliar,
                                                            $request->cod_auxiliar,
                                                            $request->nb_auxiliar,
                                                            $request->rif,
                                                            $request->nit
                                                            );
            $datatables = DataTables::of($proveedores)
            ->addIndexColumn()
            ->addColumn('actions', function($row) {
                    $button = '<div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-secondary icon" onclick="RedireccionEditarProveedor('.$row->cod_auxiliar.') "title="Clic para editar">
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

    public function MostrarAgregarProveedores () {

        return view('gestiones.proveedores.agregar_proveedor');
    }

    public function AgregarProveedores(Request $request) {

    $request->validate([
        'cod_tipo_auxiliar' => 'required|string|max:80',
        'cod_auxiliar' => 'required|int|max:10',
        'nb_auxiliar' => 'required|string|max:255',
        'rif' => 'required|string|max:30',
        'nit' => 'required|string|max:30',
    ]);

        $proveedor = new Proveedores();
        $proveedor->cod_tipo_auxiliar = $request->input('cod_tipo_auxiliar');
        $proveedor->cod_auxiliar = $request->input('cod_auxiliar');
        $proveedor->nb_auxiliar = $request->input('nb_auxiliar');
        $proveedor->rif = $request->input('rif');
        $proveedor->nit = $request->input('nit');

        $proveedor->save();

        //Try catch y $cuentas

        return redirect()->route('gestiones.proveedores.registros.obtener');
}

    public function EditarProveedorSeleccionado (Request $request, $cod_auxiliar) {

        $proveedores_model = new Proveedores;
        $proveedores = $proveedores_model->GetProveedorPorCodigo($cod_auxiliar);

        if (!$proveedores) {
            abort(404, 'Proveedor no encontrado');
        }

    return view('gestiones.proveedores.editar_proveedor', compact('proveedores'));
    }

    public function BuscarProveedores (Request $request)
    {
        if ($request->ajax()) {
            $proveedores_model = new Proveedores;
            $proveedores = $proveedores_model->get_proveedores();

            return response()->json($proveedores);
        }
    } 
}