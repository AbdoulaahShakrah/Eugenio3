<?php
//use App\Http\Controllers\ConfiguracaoController;
//use App\Http\Controllers\HomeController;
//use App\Http\Controllers\IniciarDesafio;
//use App\Http\Controllers\RealizarInscricoes;
//use App\Http\Controllers\VerResultados;
//use App\Http\Controllers\SessaoController;
//use App\Http\Controllers\DesafioController;
//use App\Http\Controllers\ClassificacaoAtualController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SessionConfigurationController;
use App\Http\Controllers\SessionController;
use App\Models\Configuration;

// V3 2024-2025

Route::redirect('/', 'v3');

Route::get('v3', [MainController::class, 'index'])->name('home');
Route::post('handleButtons', [MainController::class, 'handleButtons'])->name('handleButtons');
Route::post('/checkAdminPasswod', [MainController::class, 'checkAdminPassword'])->name('admin.validate');
Route::get('/admin', [MainController::class, 'admin'])->name('admin');

Route::get('v3/sessions', [SessionController::class, 'index'])->name('sessions.index');
Route::post('v3/sessions', [SessionController::class, 'store'])->name('session.store');
Route::patch('v3/sessions/update', [SessionController::class, 'update'])->name('session.update');
Route::delete('v3/sessions/{id}', [SessionController::class, 'destroy'])->name('session.destroy');

Route::get('v3/configurations', [ConfigurationController::class, 'index'])->name('config.index');
Route::post('v3/configurations/create', [ConfigurationController::class, 'create'])->name('config.create');
Route::post('v3/configurations/store', [ConfigurationController::class, 'store'])->name('config.store');
Route::post('v3/configurations/change/{id}', [ConfigurationController::class, 'change'])->name('config.change');
Route::post('v3/configurations/update/{id}', [ConfigurationController::class, 'update'])->name('config.update');
Route::delete('v3/configurations/{id}', [ConfigurationController::class, 'destroy'])->name('config.destroy');

Route::get('v3/sessions/sessionPlayers/{id}', [PlayerController::class, 'sessionPlayers'])->name('player.sessionPlayers');
Route::post('v3/sessions/sessionPlayers/{id}', [PlayerController::class, 'store'])->name('player.store');
Route::patch('v3/sessions/sessionsPlayers/edit', [PlayerController::class, 'edit'])->name('player.edit');
Route::delete('v3/sessions/sessionPlayers/{id1}/players/{id2}', [PlayerController::class, 'destroy'])->name('player.destroy');

Route::get('/v3/sessions/{session_id}/configs', [SessionConfigurationController::class, 'index'])->name('sessionconfig.index');
Route::post('/v3/sessions/{session_id}/update', [SessionConfigurationController::class, 'update'])->name('sessionconfiguration.update');

Route::post('checkSessionPassword', [ChallengeController::class, 'checkSessionPassword'])->name('challenge.check_session_password');
Route::get('/chooseTest/{session_id}', [ChallengeController::class, 'index'])->name('challenge.start');
Route::post('/challange/validateSettings', [ChallengeController::class, 'validateSettings'])->name('challenge.validate');
Route::get('challenge/{session_id}/{player_id}/{config_id}', [ChallengeController::class, 'playGame'])->name('challenge');
Route::get('challenge/result', [ChallengeController::class, 'showResult'])->name('challenge.result');

Route::get('final-results/{session_id}', [ClassificationController::class, 'index'])->name('final-results');

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