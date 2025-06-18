<?php

use App\Http\Controllers\CuentasController;
use App\Http\Controllers\EditarSolicitudesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\GenerarSolicitudesController;
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

//Controladores y sus Rutas
Route::controller(ProveedoresController::class)->group(function () {
    Route::get('proveedores/index', 'index')->name('proveedores.index');
});

Route::controller(CuentasController::class)->group(function () {
    Route::get('cuentas/proveedores/index', 'index')->name('cuentas.proveedores.index');
});

Route::controller(HistorialController::class)->group(function () {
    Route::get('/historial', 'index')->name('historial.index');
    Route::get('/historial/obtener', 'registros_historial')->name('historial.obtener');
});

Route::controller(GenerarSolicitudesController::class)->group(function () {
    Route::get('/generar_solicitud', 'index')->name('ordenes.generar-solicitud');
});

/*Route::controller(LoginController::class)->group(function () {
    Route::get('/login', function () {return view('auth.login');})->name('login');
});
*/

Route::get('/editar_solicitud', [EditarSolicitudesController::class, 'index'])->name('ordenes.editar-solicitud');


//Rutas sueltas (provisionales)
Route::get('/', function () {return view('index');});
Route::get('/dashboard', function () { return view('dashboard.index');})->name('dashboard');
Route::get('/login', function () {return view('auth.login');})->name('login');


/*
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home'); // Asegúrate de tener una vista 'home.blade.php'
    })->name('home');
});
*/


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




