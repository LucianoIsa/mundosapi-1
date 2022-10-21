<?php

use App\Http\Controllers\ProvinciaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/provincia', [ProvinciaController::class, 'getProvinciaSinParametro']);

Route::get('/provincias/{id}', [ProvinciaController::class, 'getProvinciaConParametro']);

Route::get('/provinciaAlternativa/{id?}', [ProvinciaController::class, 'getProvinciaAlternativa']);

// Ruta para visualizar todas las provincias registradas en la BD
Route::get('/provincias', [ProvinciaController::class, 'index']);

//Ruta para el registro de una provincia en la Base de Datos
Route::post('/insert-provincias', [ProvinciaController::class, 'store']);

//Ruta para actualizar
Route::put('/update-provincias/{id}', [ProvinciaController::class, 'update']);

//Ruta para eliminar
Route::delete('/delete-provincias/{id}', [ProvinciaController::class, 'destroy']);

//Ruta para RESTAURAR O REACTIVAR UNA PROVINCIA
Route::put('/restore-provincias/{id}', [ProvinciaController::class, 'restore']);