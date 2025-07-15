<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CentroCostoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\BancosController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\GerenciasController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\SucursalesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Controladores de Login

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'MostrarLoginForm')->name('login');

    Route::post('usuario/login', 'login')->name('usuario.login');
    Route::post('usuario/logout', 'logout')->name('usuario.logout');


}); 

//Controlador Cambio de Contraseña

Route::get('/cambiar/password', [PasswordController::class, 'MuestraCambioPasswordIndex'])->name('auth.password');
//Route::put('/cambio/password', [PasswordController::class, 'CambiarPassword'])->name('index');



//Controladores de Gestiones (Usuarios, Solicitudes, Proveedores, Departamentos, Gerencias, Sucursales, Direcciones y Empresas)

Route::middleware(['auth:usuarios'])->group(function () {
    
    //Controladores de Usuarios

    Route::controller(UsuariosController::class)->group(function () {
        Route::get('/', 'MostrarInicio')->name('index');

        Route::get('/perfil', 'MostrarPerfil')->name('usuario.perfil');
        Route::put('/perfil/cambios', 'GuardarCambiosPerfil')->name('usuario.perfil.cambios');

        Route::get('/mostrar/usuario', 'MostrarIndexUsuarios')->name('gestiones.usuarios.registros.obtener');
        Route::get('/obtener/usuario', 'DataUsuario')->name('usuario.data');

        Route::get('/usuario/crear', 'MostrarCrearUsuarios')->name('gestiones.usuarios.crear.usuarios');
        Route::post('/usuario/crear', 'CrearUsuarios')->name('gestiones.usuarios.crear.usuarios');

        Route::get('/editar/usuario/{id_usuario}', 'EditarUsuarioSeleccionado')->name('gestiones.usuarios.editar'); 
        Route::put('/editar/usuario/{id_usuario}', 'ActualizarUsuarioSeleccionado')->name('gestiones.usuarios.editar');
    });


    //Controladores de Solicitudes

    Route::controller(OrdenesController::class)->group(function () {
        Route::get('solicitudes/crear', 'MostrarCrearSolicitud')->name('ordenes.solicitud.crear');
        Route::post('solicitudes/crear', 'GuardarSolicitud')->name('ordenes.solicitud.crear');

        Route::get('/solicitudes/registros', 'MostrarIndexEditarSolicitudes')->name('ordenes.solicitud.registros');
        Route::get('/solicitudes/registros/obtener', 'RegistrosEditarSolicitudes')->name('ordenes.solicitud.registros.obtener');

        Route::get('/solicitud/editar/{id_solicitud}', 'EditarSolicitudSeleccionada')->name('ordenes.solicitud.editar'); 
        Route::put('/solicitud/editar/{id_solicitud}', 'ActualizarSolicitudSeleccionada')->name('ordenes.solicitud.editar'); 

        Route::get('/solicitudes/status', 'MostrarIndexStatusSolicitudes')->name('ordenes.solicitud.status');
        Route::get('/solicitudes/status/obtener', 'RegistrosStatusSolicitudes')->name('ordenes.solicitud.status.obtener');

        Route::get('/solicitud/status/cambiar/{id_solicitud}', 'CambiarStatusSolicitud')->name('ordenes.solicitud.status.cambiar');
        Route::put('/solicitud/status/cambiar/{id_solicitud}', 'ActualizarStatusSolicitud')->name('ordenes.solicitud.status.cambiar');  
    });


    //Controladores de Historial

    Route::controller(HistorialController::class)->group(function () {
        Route::get('/historial', 'MostrarHistorialIndex')->name('historial.index');
        Route::get('/historial/obtener', 'DataHistorial')->name('historial.data');
    });


    //Controladores de Proveedores

    Route::controller(ProveedoresController::class)->group(function () {
        Route::get('/mostrar/proveedor', 'MostrarIndexProveedores')->name('gestiones.proveedores.registros.obtener');
        Route::get('/obtener/proveedor', 'DataProveedor')->name('proveedor.data');

        Route::get('/proveedor/agregar', 'MostrarAgregarProveedores')->name('gestiones.proveedores.agregar.proveedores');
        Route::post('/proveedor/agregar', 'AgregarProveedores')->name('gestiones.proveedores.agregar.proveedores');

        Route::get('/editar/proveedor/{id_proveedor}', 'EditarProveedorSeleccionado')->name('gestiones.proveedores.editar');
        //Route::put('/editar/proveedor/{id_proveedor}', 'ActualizarProveedorSeleccionado')->name('gestiones.proveedores.editar');

        Route::get('proveedores/index', 'BuscarProveedores')->name('buscar.proveedores');
    });


    //Controladores de Empresas

    Route::controller(EmpresasController::class)->group(function () {
        Route::get('/mostrar/empresa', 'MostrarIndexEmpresas')->name('gestiones.empresas.registros.obtener');
        Route::get('/obtener/empresa', 'DataEmpresa')->name('empresa.data');

        Route::get('/empresa/agregar', 'MostrarAgregarEmpresas')->name('gestiones.empresas.agregar.empresas');
        Route::post('/empresa/agregar', 'AgregarEmpresas')->name('gestiones.empresas.agregar.empresas');

        Route::get('/editar/empresa/{codigo_empresa}', 'EditarEmpresaSeleccionada')->name('gestiones.empresas.editar');
        Route::put('/editar/empresa', 'ActualizarEmpresaSeleccionada')->name('gestiones.empresas.actualizar');

        Route::get('empresas/index', 'BuscarEmpresas')->name('buscar.empresas');
    });


    //Controladores de Sucursales

    Route::controller(SucursalesController::class)->group(function () {
        Route::get('/mostrar/sucursal', 'MostrarSucursales')->name('gestiones.sucursales.registros');
        Route::get('/mostrar/sucursal/obtener', 'DataSucursales')->name('gestiones.sucursales.registros.obtener');

        Route::get('/agregar/sucursal', 'MostrarAgregarSucursales')->name('gestiones.sucursales.agregar');
        Route::post('/agregar/sucursal', 'AgregarSucursales')->name('gestiones.sucursales.crear');

        Route::get('/editar/sucursal/{codigo_empresa}/{codigo_sucursal}', 'EditarSucursalSeleccionada')->name('gestiones.sucursales.editar');
        Route::put('/editar/sucursal', 'ActualizarSucursalSeleccionada')->name('gestiones.sucursales.actualizar');

        Route::get('sucursales/empresa/index', 'BuscarSucursalesEmpresa')->name('buscar.sucursales.empresa');
    });


    //Controladores de Direcciones

    Route::controller(DireccionesController::class)->group(function () {
        Route::get('/mostrar/direccion', 'MostrarIndexDirecciones')->name('gestiones.direcciones.registros.obtener');
        Route::get('/obtener/direccion', 'DataDireccion')->name('direccion.data');

        Route::get('/direccion/agregar', 'MostrarAgregarDirecciones')->name('gestiones.direcciones.agregar.direcciones');
        Route::post('/direccion/agregar', 'AgregarDirecciones')->name('gestiones.direcciones.agregar.direcciones');

        Route::get('/editar/direccion/{codigo_empresa}/{codigo_direccion}', 'EditarDireccionSeleccionada')->name('gestiones.direcciones.editar');
        Route::put('/editar/direccion', 'ActualizarDireccionSeleccionada')->name('gestiones.direcciones.actualizar');

        Route::get('direccion/empresa/index', 'BuscarDireccionEmpresa')->name('buscar.direccion.empresa');
    });


    //Controladores de Gerencias

    Route::controller(GerenciasController::class)->group(function () {
        Route::get('/mostrar/gerencia', 'MostrarGerencias')->name('gestiones.gerencias.registros');
        Route::get('/mostrar/gerencia/obtener', 'DataGerencia')->name('gerencia.data');

        Route::get('/agregar/gerencia', 'MostrarAgregarGerencias')->name('gestiones.gerencias.agregar.gerencias');
        Route::post('/agregar/gerencia', 'AgregarGerencias')->name('gestiones.gerencias.agregar.gerencias');

        Route::get('/editar/gerencia/{codigo_empresa}/{codigo_direccion}/{codigo_gerencias}', 'EditarGerenciaSeleccionada')->name('gestiones.gerencias.editar.gerencia');
        Route::put('/editar/gerencia', 'ActualizarGerenciaSeleccionada')->name('gestiones.gerencias.actualizar.gerencia');

        Route::get('gerencia/direccion/index', 'BuscarGerenciasDireccion')->name('buscar.gerencia.direccion');
    });


    //Controladores de Departamentos

    Route::controller(DepartamentosController::class)->group(function () {
        Route::get('/mostrar/departamento', 'MostrarIndexDepartamentos')->name('gestiones.departamentos.registros.obtener');
        Route::get('/obtener/departamento', 'DataDepartamento')->name('departamento.data');

        Route::get('/departamento/agregar', 'MostrarAgregarDepartamentos')->name('gestiones.departamentos.agregar.departamentos');
        Route::post('/departamento/agregar', 'AgregarDepartamentos')->name('gestiones.departamentos.agregar.departamentos');

        Route::get('/editar/departamento/{id_departamento}', 'EditarDepartamentoSeleccionado')->name('gestiones.departamentos.editar');
        //Route::put('/editar/departamento/{id_departamento}', 'ActualizarDepartamentoSeleccionado')->name('gestiones.departamentos.editar');

        Route::get('departamento/gerencia/index', 'BuscarDepartamentoGerencia')->name('buscar.departamento.gerencia');
    });
    
});


// Controladores para obtener informacion/funciones en segundo plano

Route::controller(BancosController::class)->group(function () {
    Route::get('bancos/registrar/index', 'BuscarBancos')->name('buscar.bancos.registrar');
});

Route::controller(CentroCostoController::class)->group(function () {
    Route::get('centro_costo/gerencia/index', 'BuscarCentroCostoGerencia')->name('buscar.centrocosto.gerencia');
    Route::get('centro_costo/empresa/index', 'BuscarCentroCostoEmpresa')->name('buscar.centrocosto.empresa');
});

Route::controller(CuentasController::class)->group(function () {
    Route::get('cuentas/proveedores/index', 'BuscarCuentasProveedores')->name('buscar.cuentas.proveedores');
});

// Rutas para cargar/elimianar archivos

Route::controller(Controller::class)->group(function () {
    Route::post('/base/cargar_archivo_temporal', 'cargar_archivo_temporal')->name('cargar.archivo');
    Route::delete('/base/eliminar_archivo_temporal','eliminar_archivo_temporal')->name('eliminar.archivo');
    Route::get('/base/consultar_documento','consultar_documento')->name('consultar.documento');
});


//Rutas sueltas (provisionales)

Route::get('/dashboard', function () { return view('dashboard.index');})->name('dashboard');

// Ruta de inicio de Laravel
Route::get('/welcome', function () { return view('welcome'); });

// Rutas de Errores
Route::get('/403', function () { return view('errors.403'); });
Route::get('/404', function () { return view('errors.404'); });
Route::get('/500', function () { return view('errors.500'); });