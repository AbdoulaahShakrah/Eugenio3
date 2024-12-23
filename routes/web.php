<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SessionConfigurationController;
use App\Http\Controllers\SessionController;


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
Route::get('/challange/chooseTest/{session_id}', [ChallengeController::class, 'index'])->name('challenge.start');
Route::post('/challange/validateSettings', [ChallengeController::class, 'validateSettings'])->name('challenge.validate');
Route::get('challenge/{session_id}/{player_id}/{config_id}', [ChallengeController::class, 'playGame'])->name('challenge');
Route::get('challenge/result', [ChallengeController::class, 'showResult'])->name('challenge.result');

Route::get('final-results/{session_id}', [ClassificationController::class, 'index'])->name('final-results');