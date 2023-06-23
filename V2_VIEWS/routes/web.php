<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
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
