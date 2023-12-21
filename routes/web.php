<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssicurazioneController;
use App\Http\Controllers\CondominioController;
use App\Http\Controllers\PolizzaController;
use App\Http\Controllers\CalendarioController;

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

Route::get('/calendario', function () {
    return view('calendario');
});

Route::resource('assicurazioni', AssicurazioneController::class);
Route::resource('polizze', PolizzaController::class);
Route::resource('condomini', CondominioController::class);
Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario.index');
Route::get('/calendario-eventi', [CalendarioController::class, 'getEventi'])->name('calendario.eventi');