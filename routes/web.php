<?php

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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientControl;

//Administrador
Route::get('/dash', [AdminController::class, 'index'])->middleware('auth');
Route::get('/cinema', [AdminController::class, 'getCinema'])->middleware('auth')->name('cinema');

Route::post('/inserircinema', [AdminController::class, 'store'])->middleware('auth');
Route::post('/inserirsala', [AdminController::class, 'setSala'])->middleware('auth');
Route::post('/inserirlugar', [AdminController::class, 'setLugar'])->middleware('auth');
Route::post('/inserirfilme', [AdminController::class, 'setFilme'])->middleware('auth');
Route::post('/inserirseccao', [AdminController::class, 'setSeccao'])->middleware('auth');



Route::get('/ajax-cidades', [AdminController::class, 'loadCidade'])->name('ajax-cidades');
Route::delete('/delete/{id}', [AdminController::class, 'deletar'])->middleware('auth');
Route::get('/sala', [AdminController::class, 'getSala'])->middleware('auth');
Route::get('/lugar', [AdminController::class, 'getLugar'])->middleware('auth');
Route::get('/filme', [AdminController::class, 'getFilme'])->middleware('auth');
Route::get('/sessao', [AdminController::class, 'getSessao'])->middleware('auth');
Route::get('/reserva', [AdminController::class, 'getReserva'])->middleware('auth');

//cliente
Route::get('/', [ClientControl::class, 'index']);
Route::get('/selectSessao/{id}', [ClientControl::class, 'show'])->name('selecionar');
Route::get('/ajax-sessoes', [ClientControl::class, 'loadsessao'])->name('ajax-sessoes');
Route::post('/selecionar_lugar', [ClientControl::class, 'select_lugar'])->name('selecionar_lugar');
Route::get('/user/{lugares}/{id_sec}', [ClientControl::class, 'user']);
Route::post('/gerarpdf', [ClientControl::class, 'gerarPdf']);
Route::post('/sucess', [ClientControl::class, 'sucess']);



require __DIR__.'/auth.php';
