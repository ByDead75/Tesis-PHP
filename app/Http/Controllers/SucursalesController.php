<?php

namespace App\Http\Controllers;
use App\Models\Sucursales;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    public function MostrarSucursales () {

    return view('gestiones.sucursales.mostrar_sucursal');
    }

    public function AgregarSucursales () {

    return view('gestiones.sucursales.agregar_sucursal');
    }

    public function EditarSucursales () {

    return view('');
    }

    public function EditarSucursalSeleccionada () {

    return view('gestiones.sucursales.editar_sucursal');
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