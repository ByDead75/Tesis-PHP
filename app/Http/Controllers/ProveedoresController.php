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
    public function MostrarProveedores () {

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
            ->addIndexColumn()/*
            ->addColumn('cod_tipo_auxiliar', function ($row) {
                $td = '<span class="badge">'.TipoProveedorHelper::getTipoProveedor($row->cod_tipo_auxiliar).'</span>';
                return $td;
            })
            ->rawColumns(['cod_tipo_auxiliar'])*/
            ->make(true);
            return $datatables;
        }
    }

    public function AgregarProveedores () {

    return view('gestiones.proveedores.agregar_proveedor');
    }

    public function EditarProveedores () {

    return view('');
    }

    public function EditarProveedorSeleccionado () {

    return view('gestiones.proveedores.editar_proveedor');
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