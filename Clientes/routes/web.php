<?php


use Clientes\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use Clientes\Http\Controllers\BotonesController;
use Clientes\Http\Controllers\DireccionesController;
use Clientes\Http\Controllers\JsonController;
use Clientes\Http\Controllers\JuegoLetrasController;
use Clientes\Http\Controllers\Pokemons;
use Clientes\Http\Controllers\PokemonsController;
use Clientes\Models\Direcciones;

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
    return view('Layouts/Menu');
});



//Ruta a Clientes
Route::resource('/Clientes', ClientesController::class);
Route::resource('/Direcciones', DireccionesController::class);

//Ruta a Ejercicio Json
Route::resource('/JsonClientes', JsonController::class);

//Ruta a Ejercicio Botones
Route::resource('/Botones', BotonesController::class);

//Ruta a Ejercicio JuegoLetras
Route::resource('/JuegoLetras', JuegoLetrasController::class);

//Ruta a Ejercicio Pokemons
Route::resource('/Pokemons', PokemonsController::class);
