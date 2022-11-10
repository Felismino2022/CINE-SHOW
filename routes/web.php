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

Route::get('/dash', [AdminController::class, 'index'])->middleware('auth');
Route::get('/cinema', [AdminController::class, 'getCinema'])->name('cinema');

Route::post('/inserircinema', [AdminController::class, 'store']);
Route::post('/inserirsala', [AdminController::class, 'setSala']);
Route::post('/inserirlugar', [AdminController::class, 'setLugar']);
Route::post('/inserirfilme', [AdminController::class, 'setFilme']);
Route::post('/inserirseccao', [AdminController::class, 'setSeccao']);



Route::get('/ajax-cidades', [AdminController::class, 'loadCidade'])->name('ajax-cidades');
Route::delete('/delete/{id}', [AdminController::class, 'deletar']);
Route::get('/sala', [AdminController::class, 'getSala']);
Route::get('/lugar', [AdminController::class, 'getLugar']);
Route::get('/filme', [AdminController::class, 'getFilme']);
Route::get('/sessao', [AdminController::class, 'getSessao']);
Route::get('/reserva', [AdminController::class, 'getReserva']);

//cliente
Route::get('/', [ClientControl::class, 'index']);
Route::get('/selectSessao/{id}', [ClientControl::class, 'show']);
Route::get('/ajax-sessoes', [ClientControl::class, 'loadsessao'])->name('ajax-sessoes');
Route::post('/select_lugar/{id}', [ClientControl::class, 'select_lugar']);
Route::get('/user/{id}{idl}{id_sec}', [ClientControl::class, 'user']);
Route::post('/gerarpdf', [ClientControl::class, 'gerarPdf']);
Route::post('/sucess', [ClientControl::class, 'sucess']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
