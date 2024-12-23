@extends('layouts.app')

@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('return', route('home'))
@section('instruction', 'Resultado do Teste')

@section('content')
<div class="results-main-container container mt-5">
    <h1 class="text-center mb-4 text-primary">
        Resultado do Teste
    </h1>

    <!-- Tabela Responsiva -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Palavras por minuto</th>
                    <th class="text-center">Palavras erradas</th>
                    <th class="text-center">Palavras certas</th>
                    <th class="text-center">Tempo</th>
                    <th class="text-center">Pontuação final</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">{{ $classificacao->wpm }}</td>
                    <td class="text-center">{{ $classificacao->test_error }}</td>
                    <td class="text-center">{{ $classificacao->test_correct }}</td>
                    <td class="text-center">{{ $classificacao->test_time }}</td>
                    <td class="text-center">{{ $classificacao->final_score }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Botão Voltar -->
    <div class="text-center mt-4">
        <a href="{{ route('challenge.start', ['session_id' => $player->session->session_id]) }}">
            <button class="btn btn-success btn-lg w-100 rounded-pill" style="background-color: #28a745;">Voltar</button>
        </a>
    </div>
</div>
@endsection
