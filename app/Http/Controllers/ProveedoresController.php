<?php

namespace App\Http\Controllers;
use App\Models\Proveedores;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class ProveedoresController extends Controller
{
    public function MostrarProveedores () {

    return view('gestiones.proveedores.mostrar_proveedor');
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