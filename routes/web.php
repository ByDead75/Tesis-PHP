<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\CentrosDeCostoController;
use App\Models\CentroDeCostos;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\GenerarSolicitudesController;
use App\Http\Controllers\ProveedoresController;

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

Route::controller(ProveedoresController::class)->group(function () {
    Route::get('proveedores/index', 'index')->name('proveedores.index');
});

Route::get('/generar_solicitud', [GenerarSolicitudesController::class, 'index'])->name('ordenes.index');

Route::get('/', function () {return view('template');});

Route::get('/dashboard', function () { return view('dashboard.index');})->name('dashboard');

Route::get('/login', function () {return view('auth.login');})->name('login');


// Ruta para mostrar el formulario de login
//  Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el login
//  Route::post('/login', [LoginController::class, 'login']);

// Ruta para cerrar sesión
//  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ejemplo de ruta protegida (solo accesible si el usuario está logueado)
//  Route::middleware(['auth'])->group(function () {
    //  Route::get('/home', function () {
        // return view('home'); // Asegúrate de tener una vista 'home.blade.php'
    // })->name('home');
// });

// Ruta de inicio
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/403', function () {
    return view('errors.403');
});

Route::get('/404', function () {
    return view('errors.404');
});

Route::get('/500', function () {
    return view('errors.500');
});

Route::get('/inicio', function () {
    return view('principal');
});


/*
Route::get('/generar_solicitud', function () {
    return view('ordenes.generar_solicitud');
});
*/



