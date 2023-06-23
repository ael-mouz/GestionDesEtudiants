<?php

use App\Http\Controllers\EfmController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\InscriptionController;
use App\Models\Efm;
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
    return view('layouts.app');
});

Route::resource('/etudiants', EtudiantController::class);
Route::resource('/filieres', FiliereController::class);
Route::resource('/inscriptions', InscriptionController::class);
Route::resource('/efms', EfmController::class);
