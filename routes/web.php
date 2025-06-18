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
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('usuario/login', 'login')->name('usuario.login');
    Route::post('usuario/logout', 'logout')->name('usuario.logout');
    Route::get('/', 'inicio')->name('index');
});

//Controladores de Historial

Route::controller(HistorialController::class)->group(function () {
    Route::get('/historial', 'index')->name('historial.index');
    Route::get('/historial/obtener', 'registros_historial')->name('historial.obtener');
});

//Controladores de Cargar/Editar/Aprobar Solicitudes

Route::controller(ProveedoresController::class)->group(function () {
    Route::get('proveedores/index', 'index')->name('proveedores.index');
});

Route::controller(CuentasController::class)->group(function () {
    Route::get('cuentas/proveedores/index', 'index')->name('cuentas.proveedores.index');
});

Route::controller(OrdenesController::class)->group(function () {
    Route::get('/generar_solicitud', 'get_cargar_solicitud')->name('ordenes.generar-solicitud');
    Route::get('/editar_solicitud', 'index')->name('ordenes.editar-solicitud');
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




