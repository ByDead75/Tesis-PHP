<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\CentroDeCostosController;
use App\Http\Controllers\CentrosDeCostoController;
use App\Models\CentroDeCostos;

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

Route::get('/bancos', [CentrosDeCostoController::class, 'index'])->name('bancos.index');

/*Route::get('/centros', [CentrosDeCostoController::class, 'index'])->name('centros.index'); */

Route::get('/', function () {return view('template');});

Route::get('/dashboard', function () { return view('dashboard.index');})->name('dashboard');

Route::get('/login', function () {return view('auth.login');})->name('login');



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

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/listado_bancos', function () {
    return view('listado_bancos');
});
