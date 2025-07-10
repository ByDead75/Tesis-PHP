<?php

namespace App\Http\Controllers;
use App\Models\Sucursales;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SucursalesController extends Controller
{
    public function MostrarSucursales () {

    return view('gestiones.sucursales.mostrar_sucursal');
    }

    public function DataSucursales (Request $request) {

        if ($request->ajax()) {
            
            $sucursales_model = new Sucursales;
            $sucursales = $sucursales_model->get_sucursales($request->codigo_empresa,
                                                            $request->nombre_empresa,
                                                            $request->codigo_sucursal,
                                                            $request->nombre_sucursal);
                                                            

            $datatables = DataTables::of($sucursales)
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    $button = '<div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-secondary icon"  onclick="RedireccionEditarSucursal('.$row->COD_EMPRESA.','.$row->COD_SUCURSAL.' ) "title="Clic para editar">
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

    public function MostrarAgregarSucursales () {

        return view('gestiones.sucursales.agregar_sucursal');
    }

    public function AgregarSucursales (Request $request) {

        $ultimaSucursal = Sucursales::orderby('COD_SUCURSAL', 'desc')->first();
        $nuevaCodSucursal = $ultimaSucursal ? $ultimaSucursal->COD_SUCURSAL + 1 : 1;

        try {

            $sucursal = new Sucursales();

            $sucursal->COD_EMPRESA = $request->input('empresa_codigo');
            $sucursal->COD_SUCURSAL = $nuevaCodSucursal;

            $sucursalNombre = $request->input('sucursal');
            $sucursal->NB_SUCURSAL = strtoupper(trim(preg_replace('/\s+/', ' ', $sucursalNombre)));

            $sucursal->FECHA_INACTIVACION = null;
            $sucursal->save();

            return redirect()->route('gestiones.sucursales.registros');

        } catch (\Exception $e) {
            
            return back()->withErrors(['error' => 'Ocurrió un error al guardar los datos.']);
        }

        
    }

    

    public function EditarSucursalSeleccionada (Request $request, $codigo_empresa, $codigo_sucursal) {

        $sucursales_model = new Sucursales;
        $sucurdal = $sucursales_model->GetSucursalPorId($codigo_empresa, $codigo_sucursal);

        if (!$sucurdal) {
            abort(404, 'Sucursal no encontrada.');
        }

        return view('gestiones.sucursales.editar_sucursal', compact('sucurdal'));
    }

    public function ActualizarSucursalSeleccionada (Request $request) {

        
        $sucursales_model = new Sucursales;
        $sucursal = $sucursales_model->GetSucursalPorId($request->input('empresa_codigo_viejo'), $request->input('sucursal_codigo'));

            $sucursal->COD_EMPRESA = $request->input('empresa_codigo_viejo');
            
            $sucursal->COD_SUCURSAL = $request->input('sucursal_codigo');

            $sucursalNombre = $request->input('sucursal');
            $sucursal->NB_SUCURSAL = strtoupper(trim(preg_replace('/\s+/', ' ', $sucursalNombre)));

            $sucursal->FECHA_INACTIVACION = null;
            $sucursal->save();

            return redirect()->route('gestiones.sucursales.registros');

        
    }
    

    public function BuscarSucursalesEmpresa (Request $request)
    {
        if ($request->ajax()) {
            $sucursales_empresa_model = new Sucursales;
            $sucursales_empresa = $sucursales_empresa_model->get_sucursales_empresas($request->codigo_empresa);

            return response()->json($sucursales_empresa);
        }
    } 

} 