@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('return', route('home'))
@section('instruction', 'Resultado do Teste')

@section('content')
<div class="h5 py-2 mb-1 w-100 rounded border border-success text-center">
    <div class="title-container">
        <h5>
            <strong>Configuração:</strong> {{ $Configuracao->configuration_title }}
        </h5>
        <?php
            echo '<p id="expected-text" class="text-gray-800 text-center mb-3" style="font-size: 16px;">' . $expectedTextWithStyles . '</p>';
        ?>
    </div>
</div>
    <h3 class="h5 py-2 mb-1 w-100 rounded border border-success text-center"><strong>Jogador / Sessão </strong>{{ $player->player_name }} / {{ $session->session_name }}</h3>
    <h3 class="h5 py-2 mb-1 w-100 rounded border border-success text-center"><strong>Palavras por minuto: </strong>{{ $classificacao->wpm }}</h3>
    <h3 class="h5 py-2 mb-1 w-100 rounded border border-success text-center"><strong>Quantidade de palavras erradas: </strong>{{ $classificacao->test_error }}</h3>
    <h3 class="h5 py-2 mb-1 w-100 rounded border border-success text-center"><strong>Quantidade de palavras certas: </strong>{{ $classificacao->test_correct }}</h3>
    <h3 class="h5 py-2 mb-3 w-100 rounded border border-success text-center"><strong>Tempo: </strong>{{ $classificacao->test_time}}</h3>
    <h3 class="h1 py-3 mb-3 w-100 rounded border border-success text-center"><strong>Pontuação final: </strong>{{ $classificacao->final_score }}</h3>

    <a href="{{ route('challenge.start', ['session_id' => $player->session->session_id]) }}">
        <button class="h5 py-3 mb-0 mb-5 w-100 rounded border border-success text-white text-center" style="background-color: #28a745;">Voltar</button>
    </a>

@endsection
