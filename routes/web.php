<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IniciarDesafio;
use App\Http\Controllers\RealizarInscricoes;
use App\Http\Controllers\VerResultados;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\DesafioController;
use App\Http\Controllers\ClassificacaoAtualController;

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
