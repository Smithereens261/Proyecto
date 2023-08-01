<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::resource('Chofer','App\Http\Controllers\ChoferController');
Route::resource('Camion','App\Http\Controllers\CamionController');
Route::resource('Estacion','App\Http\Controllers\EstacionController');
Route::resource('Ruta','App\Http\Controllers\RutaController');
Route::resource('Recorridos','App\Http\Controllers\RecorridoController');
Route::resource('Puntosruta','App\Http\Controllers\PuntosRutaController');
Route::resource('Grafica','App\Http\Controllers\GraficaController');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
