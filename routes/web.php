<?php

use App\Http\Controllers\RegisterController;
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
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/listaUsuario', [UserController::class, 'index'])->name('listaUsuario');
Route::delete('/listaUsuario/{user}', [UserController::class, 'destroy'])->name('destroy');
Route::get('/usuario/{user}/edit', [UserController::class, 'edit'])->name('usuario.edit');
Route::put('/usuario/{user}', [UserController::class, 'update'])->name('usuario.update');

Route::get('/plataforma', [PlataformaController::class, 'reg'])->name('plataforma.reg');
Route::post('/plataforma/create', [PlataformaController::class, 'create'])->name('plataforma.create');
Route::get('/listaPlataforma', [PlataformaController::class, 'index'])->name('listaPlataforma');
Route::delete('/listaPlataforma/{plataforma}', [PlataformaController::class, 'destroy'])->name('plataformaDestroy');
Route::get('/plataforma/{plataforma}/edit', [PlataformaController::class, 'edit'])->name('plataforma.edit');
Route::put('/plataforma/{pataforma}', [PlataformaController::class, 'update'])->name('plataforma.update');


Route::get('/register', [RegisterController::class, 'index'])->name ('register');
