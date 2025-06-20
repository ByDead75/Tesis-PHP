<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\HistorialController;

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

//Controladores de Historial

Route::controller(HistorialController::class)->group(function () {
    Route::get('/historial', 'MostrarHistorialIndex')->name('historial.index');
    Route::get('/historial/obtener', 'DataHistorial')->name('historial.data');
});

//Controladores de Crear/Editar/Aprobar Solicitudes

Route::controller(ProveedoresController::class)->group(function () {
    Route::get('proveedores/index', 'BuscarProveedores')->name('buscar.proveedores');
});

Route::controller(CuentasController::class)->group(function () {
    Route::get('cuentas/proveedores/index', 'BuscarCuentasProveedores')->name('buscar.cuentas.proveedores');
});

Route::controller(OrdenesController::class)->group(function () {
    Route::get('solicitudes/crear', 'MostrarCrearSolicitud')->name('ordenes.solicitud.crear');


    Route::get('/solicitudes/registros', 'MostrarIndexEditarSolicitudes')->name('ordenes.solicitud.registros');
    Route::get('/solicitudes/registros/obtener', 'RegistrosEditarSolicitudes')->name('ordenes.solicitud.registros.obtener');

                
    Route::get('/solicitud/editar', 'MostrarSolicitudSeleccionada')->name('ordenes.mostrar.solicitud.selecionada');
    Route::get('/solicitud/editar/{id_solicitud}', 'EditarSolicitudSeleccionada')->name('ordenes.solicitud.registros.selecionada'); 
    
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




