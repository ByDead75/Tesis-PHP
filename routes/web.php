<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BancoController;

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

Route::get('/bancos', [BancoController::class, 'index'])->name('bancos.index');

Route::get('/', function () {
    return view('template');
});

Route::get('/panel', function () {
    return view('panel.index');
});

Route::get('/login', function () {
    return view('auth.login');
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

Route::get('/prueba', function () {
    return view('prueba');
});
