<?php

use App\Http\Controllers\MapaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('mapa',[MapaController::class, 'index'])->name('mapa');
Route::get('mapa1',[MapaController::class, 'index1'])->name('mapa1');
