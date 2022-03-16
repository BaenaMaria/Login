<?php

use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\UserController;
use App\Models\Plataforma;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/plataforma', [PlataformaController::class, 'reg'])->name('plataforma.reg');
Route::post('/plataforma/create', [PlataformaController::class, 'create'])->name('plataforma.create');
Route::get('/listaUsuario', [UserController::class, 'index'])->name('listaUsuario');
Route::delete('/listaUsuario/{user}', [UserController::class, 'destroy'])->name('destroy');
