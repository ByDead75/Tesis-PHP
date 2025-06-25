<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Empleados1;

class UsuariosController extends Controller {

    public function MostrarUsuarios () {

        $empleados1_model = new Empleados1;

    return view('gestiones.usuarios.mostrar_usuario');
    }

    public function CrearUsuarios () {

    return view('gestiones.usuarios.crear_usuario');
    }

    public function EditarUsuarios () {

    if ($request->ajax()) {
            $usuarios_model = new Usuarios;
            $usuarios = $usuarios_model->GetUsuarios($request->cedula);
            $datatables = DataTables::of($usuarios)
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    $button = '<div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-secondary icon"  onclick="RedireccionEditarUsuarios('.$row->cedula.') "title="Clic para editar">
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

    public function EditarUsuarioSeleccionado(Request $request, $cedula) 
    {   
        $usuarios_model = new Usuarios;
        $usuario = $usuarios_model->GetUsuariosPorCedula($cedula);

        if (!$usuario) {
            abort(404, 'Usuario no encontrado');
        }

        return view('gestiones.usuarios.editar_usuario', compact('usuario'));
    }
}