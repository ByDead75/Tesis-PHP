<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Contracts\Support\Jsonable;
use Nette\Utils\Json;

class EmpresasController extends Controller
{
    public function MostrarEmpresas () {

    return view('gestiones.empresas.mostrar_empresa');
    }

    public function AgregarEmpresas () {

    return view('gestiones.empresas.agregar_empresa');
    }

    public function EditarEmpresas () {

    return view('');
    }

    public function EditarEmpresaSeleccionada () {

    return view('gestiones.empresas.editar_empresa');
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