<?php

namespace App\Http\Controllers;
use App\Helpers\UserMasterHelper;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller {

    public function MostrarIndexUsuarios () {

        return view('gestiones.usuarios.mostrar_usuario');
    }

    public function DataUsuario (Request $request) {

        if ($request->ajax()) {
            
            $usuario_model = new Usuario;
            $usuarios = $usuario_model->obtener_usuarios($request->cedula,
                                                    $request->nombre,
                                                    $request->cod_departamento, 
                                                    $request->fecha_registro,
                                                    $request->user_master,
                                                    $request->email, 
                                                    $request->cod_centro_costo
                                                    );
            $datatables = DataTables::of($usuarios)
            ->addIndexColumn()
            ->addColumn('actions', function($row) {
                    $button = '<div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-secondary icon"  onclick="RedireccionEditarUsuario('.$row->id.') "title="Clic para editar">
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

    public function MostrarCrearUsuarios () {

        return view('gestiones.usuarios.crear_usuario');
    }

    public function CrearUsuarios (Request $request) {


        $usuario = new Usuario();

        $usuario->nombre = $request->input('nombre_apellido_usuario');
        $usuario->cedula = $request->input('cedula');
        $usuario->cod_empresa = $request->input('empresa_codigo');
        $usuario->cod_direccion = $request->input('direccion_codigo');
        $usuario->cod_sucursal = $request->input('sucursal_codigo');
        $usuario->cod_departamento = $request->input('departamento_codigo');
        $usuario->cod_gerencia = $request->input('gerencia_codigo');
        $usuario->cod_centro_costo = $request->input('centro_costo_codigo'); 
        $usuario->email = $request->input('email');
        $usuario->fecha_registro = $request->input('fecha_ingreso');
        $usuario->user_master = $request->input('user_master');

        $usuario->password = md5($request->input('password'));

        $usuario->save();

        return redirect()->route('gestiones.usuarios.registros.obtener');
    }

    
    public function EditarUsuarioSeleccionado(Request $request, $id_usuario) 
    {   
        $usuarios_model = new Usuario;
        $usuario = $usuarios_model->GetUsuariosPorId($id_usuario);

        if (!$usuario) {
            abort(404, 'Usuario no encontrado');
        }

        return view('gestiones.usuarios.editar_usuario', compact('usuario'));
    }

    public function ActualizarUsuarioSeleccionado(Request $request, $cedula) 
    {   
        return redirect()->route('gestiones.usuarios.registros');
    }
}