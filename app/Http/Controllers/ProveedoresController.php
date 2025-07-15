<?php

namespace App\Http\Controllers;
use App\Helpers\TipoProveedorHelper;
use App\Models\Proveedores;
use App\Models\Cuentas;
use Yajra\DataTables\DataTables;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Http\Request;
use Nette\Utils\Json;
use Illuminate\Support\Facades\Validator;

class ProveedoresController extends Controller
{
    public function MostrarIndexProveedores () {

    return view('gestiones.proveedores.mostrar_proveedor');
    }

    public function DataProveedor (Request $request) {

        if ($request->ajax()) {
            
            $proveedores_model = new Proveedores;
            $proveedores = $proveedores_model->obtener_proveedores($request->nb_auxiliar,
                                                            $request->cod_tipo_auxiliar,
                                                            $request->cod_auxiliar,
                                                            $request->rif,
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

    $validator = Validator::make($request->all(), [
        'cod_tipo_auxiliar' => 'required',
        'cod_auxiliar' => 'required|unique:proveedores',
        'nb_auxiliar' => 'required',
        'rif' => 'required',
        'nit' => 'required',
        'registro_banco_codigo' => 'required',
        'numero_cuenta' => 'required',
    ], [
            'cod_auxiliar.unique' => 'La codígo de proveedor ya está en uso.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

    try {
        $proveedor = new Proveedores();

        $proveedorNombre = $request->input('nb_auxiliar');
        $proveedorNombreVerificado = strtoupper(trim(preg_replace('/\s+/', ' ', $proveedorNombre)));

        $proveedor->cod_tipo_auxiliar = $request->input('cod_tipo_auxiliar');
        $proveedor->cod_auxiliar = $request->input('cod_auxiliar');
        $proveedor->nb_auxiliar = $proveedorNombreVerificado;
        $proveedor->rif = $request->input('rif');
        $proveedor->nit = $request->input('nit');

        $proveedor->save();

        $cuentas = new Cuentas();
        $cuentas->cod_banco = $request->input('registro_banco_codigo');
        $cuentas->nu_cuenta = $request->input('numero_cuenta');
        $cuentas->destino = 'L';
        $cuentas->cod_auxiliar = $proveedor->cod_auxiliar;
        $cuentas->cod_tipo_auxiliar = $proveedor->cod_tipo_auxiliar;

        $cuentas->save();

        return redirect()->route('gestiones.proveedores.registros.obtener');
    } catch (\Exception $e) {
        dd($e);
        return back()->withErrors(['error' => 'Ocurrió un error al guardar los datos.']);
    }
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