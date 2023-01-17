<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoresController;
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


Route::get('/autor/registrar', [AutoresController::class, 'registrarForm' ]);
Route::post('/autor/registrar', [AutoresController::class, 'registrar' ])->name('autor.registrar');
Route::get('/autor/listar', [AutoresController::class, 'listar' ])->name('autor.listar');
Route::post('/autor/modificarForm', [AutoresController::class, 'modificarForm' ])->name('autor.modificarForm');
Route::post('/autor/modificar', [AutoresController::class, 'modificar' ])->name('autor.modificar');
Route::get('/autor/borrar/{id}', [AutoresController::class, 'borrar' ])->name('autor.borrar');
