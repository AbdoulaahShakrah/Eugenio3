@extends('layouts.app')

@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('return', route('home'))
@section('instruction', 'Resultado do Teste')

@section('content')
<div class="results-main-container">
    <h1 class="text-center mb-4">
        Resultado do Teste
    </h1>
    <div class="table-container overflow-x-auto">
        <table class="results-table rounded-lg border-collapse border border-gray-400 w-full text-center">
            <thead class="bg-gray-200 text-lg">
                <tr>
                    <th class="border border-gray-400 px-4 py-2">Configuração</th>
                    <th class="border border-gray-400 px-4 py-2">Jogador / Sessão</th>
                    <th class="border border-gray-400 px-4 py-2">Palavras por minuto</th>
                    <th class="border border-gray-400 px-4 py-2">Palavras erradas</th>
                    <th class="border border-gray-400 px-4 py-2">Palavras certas</th>
                    <th class="border border-gray-400 px-4 py-2">Tempo</th>
                    <th class="border border-gray-400 px-4 py-2">Pontuação final</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-400 px-4 py-2">{{ $Configuracao->configuration_title }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $player->player_name }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $classificacao->wpm }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $classificacao->test_error }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $classificacao->test_correct }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $classificacao->test_time }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $classificacao->final_score }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('challenge.start', ['session_id' => $player->session->session_id]) }}">
            <button class="h5 py-3 mb-0 mb-5 w-100 rounded border border-success text-white text-center" style="background-color: #28a745;">Voltar</button>
        </a>    
    </div>

    <!--<form action="{{ route('challenge.start', ['session_id' => $player->session->session_id]) }}" method="GET">
        @csrf
        <input type="hidden" name="configuration_id" value="{{ $Configuracao->configuration_id }}">
    </form>-->
</div>
@endsection
