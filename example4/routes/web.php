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
    return view('welcome');
});
#Route::resource es un método en Laravel que genera automáticamente varias rutas para realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) en un recurso.
#'almacen/categoria' es el URI (Uniform Resource Identifier) para el recurso. En este caso, el recurso es categoria en almacen.
#'CategoriaController' es el nombre del controlador que maneja las solicitudes para este recurso. Laravel llamará a diferentes métodos en este controlador dependiendo de la operación CRUD que se esté realizando.
Route::resource('almacen/categoria','CategoriaController');
