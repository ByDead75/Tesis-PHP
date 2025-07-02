<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CentroCostoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\DireccionController;
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
    Route::get('/', 'MostrarInicio')->name('index');
}); 


// Rutas para cargar/elimianar archivos

Route::controller(Controller::class)->group(function () {
    Route::post('/base/cargar_archivo_temporal', 'cargar_archivo_temporal')->name('cargar.archivo');
    Route::delete('/base/eliminar_archivo_temporal','eliminar_archivo_temporal')->name('eliminar.archivo');
});


//Controlador Cambio de Contraseña

Route::get('/cambiar/password', [PasswordController::class, 'MuestraCambioPasswordIndex'])->name('auth.password');
//Route::put('/cambio/password', [PasswordController::class, 'CambiarPassword'])->name('index');


//Controladores de Gestiones (Usuarios, Proveedores, Departamentos y Empresas)

Route::controller(UsuariosController::class)->group(function () {
    Route::get('/mostrar/usuario', 'MostrarIndexUsuarios')->name('gestiones.usuarios.registros.obtener');
    Route::get('/crear/usuario', 'CrearUsuarios')->name('gestiones.usuarios.crear.usuarios');
    Route::get('/editar/usuario', 'EditarUsuarios')->name('gestiones.usuarios.editar.usuarios');
    Route::get('/editar/usuario', 'DataUsuario')->name('usuario.data');
});

Route::controller(EmpresasController::class)->group(function () {
    Route::get('/mostrar/empresa', 'MostrarEmpresas')->name('gestiones.empresas.registros.obtener');
    Route::get('/agregar/empresa', 'AgregarEmpresas')->name('gestiones.empresas.agregar.empresas');
    Route::get('/editar/empresa', 'EditarEmpresas')->name('gestiones.empresas.editar.empresas');

    Route::get('empresas/index', 'BuscarEmpresas')->name('buscar.empresas');
});

Route::controller(DepartamentosController::class)->group(function () {
    Route::get('/mostrar/departamento', 'MostrarDepartamentos')->name('gestiones.departamentos.registros.obtener');
    Route::get('/agregar/departamento', 'AgregarDepartamentos')->name('gestiones.departamentos.agregar.departamentos');
    Route::get('/editar/departamento', 'EditarDepartamentos')->name('gestiones.departamentos.editar.departamentos');

    Route::get('departamento/gerencia/index', 'BuscarDepartamentoGerencia')->name('buscar.departamento.gerencia');
});


//Controladores de Historial

Route::controller(HistorialController::class)->group(function () {
    Route::get('/historial', 'MostrarHistorialIndex')->name('historial.index');
    Route::get('/historial/obtener', 'DataHistorial')->name('historial.data');
});

//Controladores de Crear/Editar/Aprobar Solicitudes

Route::controller(ProveedoresController::class)->group(function () {
    Route::get('/mostrar/proveedor', 'MostrarProveedores')->name('gestiones.proveedores.registros.obtener');
    Route::get('/agregar/proveedor', 'AgregarProveedores')->name('gestiones.proveedores.agregar.proveedores');
    Route::get('/editar/proveedor', 'EditarProveedores')->name('gestiones.proveedores.editar.proveedores');
    Route::get('proveedores/index', 'BuscarProveedores')->name('buscar.proveedores');
});

Route::controller(CuentasController::class)->group(function () {
    Route::get('cuentas/proveedores/index', 'BuscarCuentasProveedores')->name('buscar.cuentas.proveedores');
});

Route::controller(SucursalesController::class)->group(function () {
    Route::get('/mostrar/sucursal', 'MostrarSucursales')->name('gestiones.sucursales.registros.obtener');
    Route::get('/agregar/sucursal', 'AgregarSucursales')->name('gestiones.sucursales.agregar.sucursal');
    Route::get('/editar/sucursal', 'EditarSucursales')->name('gestiones.sucursales.editar.sucursal');
    Route::get('sucursales/empresa/index', 'BuscarSucursalesEmpresa')->name('buscar.sucursales.empresa');
});

Route::controller(DireccionController::class)->group(function () {
    Route::get('/mostrar/direccion', 'MostrarDirecciones')->name('gestiones.direcciones.registros.obtener');
    Route::get('/agregar/direccion', 'AgregarDirecciones')->name('gestiones.direcciones.agregar.direccion');
    Route::get('/editar/direccion', 'EditarDirecciones')->name('gestiones.direcciones.editar.direccion');
    Route::get('direccion/empresa/index', 'BuscarDireccionEmpresa')->name('buscar.direccion.empresa');
});

Route::controller(GerenciasController::class)->group(function () {
    Route::get('/mostrar/gerencia', 'MostrarGerencias')->name('gestiones.gerencias.registros.obtener');
    Route::get('/agregar/gerencia', 'AgregarGerencias')->name('gestiones.gerencias.agregar.gerencia');
    Route::get('/editar/gerencia', 'EditarGerencias')->name('gestiones.gerencias.editar.gerencia');
    Route::get('gerencia/direccion/index', 'BuscarGerenciasDireccion')->name('buscar.gerencia.direccion');
});

Route::controller(CentroCostoController::class)->group(function () {
    Route::get('centro_costo/gerencia/index', 'BuscarCentroCostoGerencia')->name('buscar.centrocosto.gerencia');
    Route::get('centro_costo/empresa/index', 'BuscarCentroCostoEmpresa')->name('buscar.centrocosto.empresa');
});


Route::controller(OrdenesController::class)->group(function () {
    Route::get('solicitudes/crear', 'MostrarCrearSolicitud')->name('ordenes.solicitud.crear');
    Route::post('solicitudes/crear', 'GuardarSolicitud')->name('ordenes.solicitud.crear');

    Route::get('/solicitudes/registros', 'MostrarIndexEditarSolicitudes')->name('ordenes.solicitud.registros');
    Route::get('/solicitudes/registros/obtener', 'RegistrosEditarSolicitudes')->name('ordenes.solicitud.registros.obtener');

    Route::get('/solicitud/editar/{id_solicitud}', 'EditarSolicitudSeleccionada')->name('ordenes.solicitud.editar'); 
    Route::put('/solicitud/editar/{id_solicitud}', 'ActualizarSolicitudSeleccionada')->name('ordenes.solicitud.editar'); 
    
    //Route::put('/solicitudes/{id_solicitud}', 'ActualizarSolicitud')->name('ordenes.solicitud.actualizar.seleccionada');
});




//Rutas sueltas (provisionales)

Route::get('/dashboard', function () { return view('dashboard.index');})->name('dashboard');


// Ruta de inicio de Laravel
Route::get('/welcome', function () { return view('welcome'); });


// Rutas de Errores
Route::get('/403', function () { return view('errors.403'); });
Route::get('/404', function () { return view('errors.404'); });
Route::get('/500', function () { return view('errors.500'); });


//Rutas de Prueba
/*
Route::get('/pruebas', function () { return view('ordenes.pruebas'); });
*/




