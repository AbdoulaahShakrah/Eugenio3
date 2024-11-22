<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IniciarDesafio;
use App\Http\Controllers\RealizarInscricoes;
use App\Http\Controllers\VerResultados;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\DesafioController;
use App\Http\Controllers\ClassificacaoAtualController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SessionController;
use App\Models\Configuration;

/*
Route::get('/', [HomeController::class,'index']);

Route::get('/realizar-inscricoes', [RealizarInscricoes::class, 'index'])->name('realizar-inscricoes');

Route::get('/getSessions', [SessaoController::class, 'getAllSessions']);

Route::get('/clearSession', [SessaoController::class, 'clearSession']);

Route::get('/setSession', [SessaoController::class, 'setSession']);

Route::post('/setConfig', [ConfiguracaoController::class, 'setConfig']);

Route::post('/adicionarConfiguracao', [ConfiguracaoController::class, 'addConfig']);

Route::get('/getAllConfigs', [ConfiguracaoController::class, 'getAllConfigs']);

Route::get('/iniciar-desafio', [IniciarDesafio::class, 'index'])->name('iniciar-desafio');

Route::get('/ver-resultados', [VerResultados::class, 'index'])->name('ver-resultados');

Route::get('/sair', [HomeController::class, 'index'])->name('sair');

Route::get('/desafio', [DesafioController::class, 'index'])->name('desafio');

Route::post('/adicionarJogador', [RealizarInscricoes::class, 'adicionarJogador'])->name('adicionarJogador');

Route::get('/criar-sessao', [SessaoController::class, 'criarSessao'])->name('criar-sessao');

Route::get('/classificacao-config', [ClassificacaoAtualController::class, 'index'])->name('classificacao-config');
*/



// V3 2024-2025

Route::redirect('/', 'v3/');

Route::get('v3/', [MainController::class, 'index']);
Route::post('v3/', [MainController::class, 'handleButtons']);

Route::get('v3/sessions', [SessionController::class, 'index'])->name('sessions.index');
Route::post('v3/sessions', [SessionController::class, 'store'])->name('session.store');
Route::delete('v3/sessions/{id}', [SessionController::class, 'destroy'])->name('session.destroy');

Route::get('v3/configurations', [ConfigurationController::class, 'index'])->name('config.index');
Route::delete('v3/configurations/{id}', [ConfigurationController::class, 'destroy'])->name('config.destroy');

Route::get('v3/sessions/sessionPlayers/{id}', [PlayerController::class, 'sessionPlayers'])->name('player.sessionPlayers');
Route::post('v3/sessions/sessionPlayers/{id}', [PlayerController::class, 'store'])->name('player.store');
Route::delete('v3/sessions/sessionPlayers/{id1}/players/{id2}', [PlayerController::class, 'destroy'])->name('player.destroy');




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
