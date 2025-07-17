<?php

namespace App\Http\Controllers;
use App\Helpers\UserMasterHelper;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use App\Models\Documento;
use App\Services\DocumentoService;

class UsuariosController extends Controller {

    public function MostrarInicio(){
        
        return view('index'); 
    }

    public function MostrarPerfil()
    {
        $usuario = Auth::guard('usuarios')->user();

        return view('perfil.index', compact(['usuario'])); 
    }

    public function GuardarCambiosPerfil(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:usuario,id', 
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:20|unique:usuario,cedula,' . $request->input('id'), 
            'email' => 'required|email|unique:usuario,email,' . $request->input('id'), 
        ], [
            'id.required' => 'El campo ID es obligatorio.',
            'id.exists' => 'El ID proporcionado no existe.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'cedula.required' => 'La cédula es obligatoria.',
            'cedula.string' => 'La cédula debe ser una cadena de texto.',
            'cedula.max' => 'La cédula no puede tener más de 20 caracteres.',
            'cedula.unique' => 'La cédula ya está en uso.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $usuario = Usuario::find($request->input('id'));

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        $usuarioNombre = $request->input('nombre');
        $usuario->nombre= strtoupper(trim(preg_replace('/\s+/', ' ', $usuarioNombre)));
        $usuario->cedula = $request->input('cedula');
        $usuario->email = $request->input('email');

        $usuario->save();

        return redirect()->route('usuario.perfil');
    }



    public function MostrarIndexUsuarios () {

        return view('gestiones.usuarios.mostrar_usuario');
    }

    public function DataUsuario (Request $request) {

        if ($request->ajax()) {
            
            $usuario_model = new Usuario;
            $usuario = $usuario_model->obtener_usuarios($request->cedula,
                                                    $request->id,
                                                    $request->nombre,
                                                    $request->cod_departamento, 
                                                    $request->fecha_registro,
                                                    $request->user_master,
                                                    $request->email, 
                                                    $request->cod_centro_costo
                                                    );
            $datatables = DataTables::of($usuario)
            ->addIndexColumn()
            ->addColumn('actions', function($row) {

                    $buttons = '<div class="d-flex justify-content-between align-items-center">'; // Contenedor flex que alinea los elementos en línea
                
                // Botón Editar
                $buttons .= '<div class="btn-group" role="group">
                                <a class="btn btn-sm btn-secondary icon" onclick="RedireccionEditarUsuario('.$row->id.') "title="Clic para editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>';
                
                // Botón Cuenta
                $buttons .= '<div class="btn-group" role="group">
                                <a class="btn btn-sm btn-primary icon" onclick="RedireccionFirmaDigitalUsuario('.$row->id.')" title="Clic para agregar firma digital">
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

    public function MostrarCrearUsuarios () {

        return view('gestiones.usuarios.crear_usuario');
    }

    public function CrearUsuarios (Request $request) {

        $validator = Validator::make($request->all(), [
            'nombre_apellido_usuario' => 'required|string|max:255',
            'cedula' => 'required|unique:usuario,cedula,',
            'email' => 'required|email|unique:usuario,email,',
        ], [
            'nombre_apellido_usuario.required' => 'El nombre y apellido del usuario es obligatorio.',
            'nombre_apellido_usuario.string' => 'El nombre y apellido del usuario debe ser una cadena de texto.',
            'nombre_apellido_usuario.max' => 'El nombre no puede tener más de 255 caracteres.',
            'cedula.required' => 'La cédula es obligatoria.',
            'cedula.unique' => 'La cédula ya está en uso.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

        $usuario = new Usuario();

        $usuarioNombre = $request->input('nombre_apellido_usuario');
        $usuarioNombreVerificado = strtoupper(trim(preg_replace('/\s+/', ' ', $usuarioNombre)));
        $usuario->nombre = $usuarioNombreVerificado;
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

        return redirect()->route('gestiones.usuarios.registros.obtener')->with('success', 'Usuario agregado con exito.');
        } catch (\Exception $e) {
            dd($e);
            return back()->withErrors(['danger' => 'Ocurrió un error al registrar al usuario.']);
        }
    }

    public function EditarUsuarioSeleccionado(Request $request, $id) 
    {   
        $usuario_model = new Usuario;
        $usuario = $usuario_model->GetUsuariosPorId($id);

        $documento_model = new Documento;
        $documentos = $documento_model->GetDocumentoPorId($id);

        if (!$usuario) {
            abort(404, 'Usuario no encontrado');
        }

        return view('gestiones.usuarios.editar_usuario', compact('usuario', 'documentos'));
    }

    public function ActualizarUsuarioSeleccionado(Request $request, $id) { 
        
        
        $request->validate([
            'nombre_apellido_usuario'   => 'required',
            'cedula'   => 'required',
            'empresa_codigo' => 'required',
            'direccion_codigo' => 'required',
            'sucursal_codigo' => 'required',
            'departamento_codigo' => 'required',
            'gerencia_codigo' => 'required',
            'centro_costo_codigo' => 'required',         
            'email' => 'required',
            'fecha_registro' => 'required',
            'fecha_egreso' => 'required',
            'user_master' => 'required',
        ]);

        try {

        $usuarios_model = new Usuario;
        $usuario = $usuarios_model->GetUsuariosPorId($id);

        $usuario->nombre = $request->input('nombre_apellido_usuario');
        $usuario->cedula = $request->input('cedula');
        $usuario->cod_empresa = $request->input('empresa_codigo');
        $usuario->cod_direccion = $request->input('direccion_codigo');
        $usuario->cod_sucursal = $request->input('sucursal_codigo');
        $usuario->cod_departamento = $request->input('departamento_codigo');
        $usuario->cod_gerencia = $request->input('gerencia_codigo');
        $usuario->cod_centro_costo = $request->input('centro_costo_codigo'); 
        $usuario->email = $request->input('email');
        $usuario->fecha_registro = $request->input('fecha_registro');
        $usuario->fecha_egreso = $request->input('fecha_egreso');
        $usuario->user_master = $request->input('user_master'); 

        
        $usuario->save();

        return redirect()->route('gestiones.usuarios.registros.obtener')->with('success', 'Usuario editado con exito.');
        } catch (\Exception $e) {
            dd($e);
            return back()->withErrors(['danger' => 'Ocurrió un error al editar al Usuario.']);
        }
    }

    public function MostrarAgregarFirmaUsuarioSeleccionado(Request $request, $id) 
    {   
        $usuario_model = new Usuario;
        $usuario = $usuario_model->GetUsuariosPorId($id);

        if (!$usuario) {
            abort(404, 'Usuario no encontrado');
        }

        return view('gestiones.usuarios.agregar_firma_usuario', compact('usuario'));
    }


    public function CargarFirmaUsuarioSeleccionado(Request $request, $id) 
    {   
        try {
        $usuario_model = new Usuario;
        $usuario = $usuario_model->GetUsuariosPorId($id);

        $fecha_registro = $request->input('fecha_firma');

        //dd($fecha_registro);

        foreach($request->get('archivos') as $archivo){

            if ($archivo !== null && !empty($archivo)) {

                $ultimoDocumento = Documento::orderby('id', 'desc')->first();
                $nuevoIdDocumento = $ultimoDocumento ? $ultimoDocumento->id + 1 : 1;

                $nombre_archivo = $usuario->id . 'firmaDigital_' . ($nuevoIdDocumento) . '.' . pathinfo($archivo, PATHINFO_EXTENSION);
                    
                DocumentoService::copiar('public/temp/'.$archivo, 'public/firmas/'.$nombre_archivo);

                DocumentoService::guardar([
                        'nombre_documento' => $nombre_archivo,
                        'id_factura' => $usuario->id,
                        'id_usuario' => $usuario->cedula,
                        'tipo_documento' => 1,
                        'fecha_registro' => $fecha_registro,
                        'ruta' => 'storage/firmas/',
                        'observacion' => '',
                    ]);

                DocumentoService::eliminar('public/temp/'.$archivo);
            }
        }

        $usuario->firma_digital = $nombre_archivo;
        $usuario->save();

        return redirect()->route('gestiones.usuarios.registros.obtener')->with('success', 'Firma cargada con exito.');
        } catch (\Exception $e) {
            dd($e);
            return back()->withErrors(['danger' => 'Ocurrió un error al cargar la Firma.']);
        }
    }
}