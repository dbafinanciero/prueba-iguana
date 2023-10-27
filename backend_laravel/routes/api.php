<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ListasController;
use App\Http\Controllers\Admin\UsuariosController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('cargos', 'ListasController@ListaCargos');
//Route::get('departamentos', 'ListasController@ListaDepartamentos');


Route::get('cargos', [ListasController::class, 'ListaCargos']);
Route::get('departamentos', [ListasController::class, 'ListaDepartamentos']);

Route::get('usuarios', [UsuariosController::class, 'index']);
Route::post('store', [UsuariosController::class, 'store']);
Route::post('actualizar', [UsuariosController::class, 'update']);
Route::post('editar', [UsuariosController::class, 'edit']);


