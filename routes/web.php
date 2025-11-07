<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DisponibilidadController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\FocoController;
use App\Http\Controllers\CortinaController;
use App\Http\Controllers\AireAcondicionadoController;
use App\Http\Controllers\HistorialAireController;
use App\Http\Controllers\HistorialFocoController;
use App\Http\Controllers\MuebleController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('aulas', AulaController::class);
Route::resource('materias', MateriaController::class);
Route::resource('docentes', DocenteController::class);
Route::resource('disponibilidades', DisponibilidadController::class);
Route::resource('horarios', HorarioController::class);
Route::resource('reservas', ReservaController::class);
Route::resource('focos', FocoController::class);
Route::resource('cortinas', CortinaController::class);
Route::resource('aires', AireAcondicionadoController::class);
Route::resource('historial-aires', HistorialAireController::class);
Route::resource('historial-focos', HistorialFocoController::class);
Route::resource('muebles', MuebleController::class);
