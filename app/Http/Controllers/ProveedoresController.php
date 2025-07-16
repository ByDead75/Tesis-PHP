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
                    $buttons = '<div class="d-flex justify-content-between align-items-center">'; // Contenedor flex que alinea los elementos en línea
                
                // Botón Editar
                $buttons .= '<div class="btn-group mr-2" role="group">
                                <a class="btn btn-sm btn-secondary icon" onclick="RedireccionEditarProveedor(\''.$row->cod_tipo_auxiliar.'\','.$row->cod_auxiliar.')" title="Clic para editar">
                                    <i class="fas fa-edit"></i> 
                                </a>
                            </div>';
                
                // Botón Cuenta
                $buttons .= '<div class="btn-group" role="group">
                                <a class="btn btn-sm btn-primary icon" onclick="RedireccionAgregarCuentaBancaria(\''.$row->cod_tipo_auxiliar.'\','.$row->cod_auxiliar.')" title="Clic para agregar cuenta bancaria">
                                    <i class="fas fa-plus"></i> 
                                </a>
                            </div>';
                
                $buttons .= '</div>'; // Cierra el contenedor flex
                
                return $buttons;
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

    public function EditarProveedorSeleccionado (Request $request, $cod_tipo_auxiliar, $cod_auxiliar) {

        $proveedores_model = new Proveedores;
        $proveedor = $proveedores_model->GetProveedorPorCodigo($cod_tipo_auxiliar, $cod_auxiliar);

        $cuentas_model = new Cuentas;
        $cuentas = $cuentas_model->GetCuentasProveedorPorCodigo($cod_tipo_auxiliar, $cod_auxiliar);

        if (!$proveedor) {
            abort(404, 'Proveedor no encontrado');
        }

        return view('gestiones.proveedores.editar_proveedor', compact('proveedor', 'cuentas'));
    }

    public function ActualizarProveedorSeleccionado (Request $request) {

        try {

            $proveedorNombre = $request->input('nb_auxiliar');
            $proveedorNombreVerificado = strtoupper(trim(preg_replace('/\s+/', ' ', $proveedorNombre)));

            $cod_tipo_auxiliar = $request->input('cod_tipo_auxiliar');
            $cod_auxiliar = $request->input('cod_auxiliar');
            $rif = $request->input('rif');
            $nit = $request->input('nit');

            $cod_banco = $request->input('registro_banco_codigo'); 
            $nu_cuenta = $request->input('numero_cuenta'); 

            $proveedor = Proveedores::where('cod_tipo_auxiliar', $request->input('viejo_cod_tipo_auxiliar'))
            ->where('cod_auxiliar', $request->input('viejo_cod_auxiliar'))
            ->update([ 'cod_tipo_auxiliar' => $cod_tipo_auxiliar,
                        'cod_auxiliar' => $cod_auxiliar,
                        'nb_auxiliar' => $proveedorNombreVerificado,
                        'rif' => $rif,
                        'nit' => $nit,]);

            if (!$proveedor) {
                abort(404, 'Proveedor no encontrada');
            }

                return redirect()->route('gestiones.proveedores.registros.obtener');

        } catch (\Exception $e) {
            
            return back()->withErrors(['error' => 'Ocurrió un error al guardar los datos.']);
        }

    }

    public function MostrarAgregarCuentaProveedorSeleccionado (Request $request, $cod_tipo_auxiliar, $cod_auxiliar) {

        $proveedores_model = new Proveedores;
        $proveedor = $proveedores_model->GetProveedorPorCodigo($cod_tipo_auxiliar, $cod_auxiliar);

        if (!$proveedor) {
            abort(404, 'Proveedor no encontrado');
        }

        return view('gestiones.proveedores.agregar_cuenta_proveedor', compact('proveedor'));
    }


    public function AgregarCuentaProveedorSeleccionado (Request $request) {

        $cod_tipo_auxiliar = $request->input('cod_tipo_auxiliar');
        $cod_auxiliar = $request->input('cod_auxiliar');

        $cuentas = new Cuentas();
        $cuentas->cod_banco = $request->input('registro_banco_codigo');
        $cuentas->nu_cuenta = $request->input('numero_cuenta');
        $cuentas->destino = 'L';
        $cuentas->cod_auxiliar = $cod_auxiliar;
        $cuentas->cod_tipo_auxiliar = $cod_tipo_auxiliar;

        $cuentas->save();

        return redirect()->route('gestiones.proveedores.registros.obtener');
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