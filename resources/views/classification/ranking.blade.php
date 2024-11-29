@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Resultados Gerais da Sessão')
@section('return', route('home'))

@section('content')
<div class="results-main-container">
    <h1 class="text-center mb-4">
        {{ $session->session_name }}
    </h1>
    <div class="table-container overflow-x-auto">
        <table class="results-table rounded-lg border-collapse border border-gray-400 w-full text-center">
            <thead class="bg-gray-200 text-lg">
                <tr>
                    <th class="border border-gray-400 px-4 py-2">Jogador</th>
                    <th class="border border-gray-400 px-4 py-2">Palavras por minuto</th>
                    <th class="border border-gray-400 px-4 py-2">Quantidade de palavras erradas</th>
                    <th class="border border-gray-400 px-4 py-2">Quantidade de palavras certas</th>
                    <th class="border border-gray-400 px-4 py-2">Tempo</th>
                    <th class="border border-gray-400 px-4 py-2">Pontuação final</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rankings as $ranking)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-400 px-4 py-2">{{ $ranking->player_name }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ number_format($ranking->avg_wpm, 2) }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ number_format($ranking->avg_test_error, 2) }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ number_format($ranking->avg_test_correct, 2) }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ gmdate('H:i:s', ($ranking->avg_test_time / 100)) }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ number_format($ranking->avg_final_score, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
</div>
@endsection
