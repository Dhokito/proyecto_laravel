<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\AlquilerController;
use App\Http\Controllers\ContactanosController;



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

Route::resource('/clientes', ClienteController::class);
Route::resource('/coches', CocheController::class);
Route::resource('/alquilers', AlquilerController::class);
Route::resource('/contactanos', ContactanosController::class);


Route::get('/clientes_pdf', [ClienteController::class, 'imprimir']);
Route::get('/coches_pdf', [CocheController::class, 'imprimir']);
Route::get('/alquilers_pdf', [AlquilerController::class, 'imprimir']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');