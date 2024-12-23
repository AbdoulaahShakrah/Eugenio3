@extends('layouts.app')

@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Resultados Gerais da Sessão')
@section('return', route('sessions.index'))

@section('content')
    <div class="results-main-container">
        <h1 class="text-center mb-4">
            {{ $session->session_name }}
        </h1>

        <!-- Tabela de rankings -->
        <div class="ranking-container">
            <table class="ranking-table">
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th>Jogador</th>
                        <th>Palavras por minuto</th>
                        <th>Quantidade de palavras erradas</th>
                        <th>Quantidade de palavras certas</th>
                        <th>Tempo</th>
                        <th>Pontuação final</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rankings as $index => $ranking)
                        @php
                            // Definindo a cor de fundo para o 1º, 2º e 3º lugar
                            $bgClass = '';
                            if ($index == 0) {
                                $bgClass = 'bg-gold';  // Dourado para o primeiro lugar
                            } 
                        @endphp
                        <tr class="{{ $bgClass }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ranking->player_name }}</td>
                            <td>{{ number_format($ranking->avg_wpm, 2) }}</td>
                            <td>{{ number_format($ranking->avg_test_error, 2) }}</td>
                            <td>{{ number_format($ranking->avg_test_correct, 2) }}</td>
                            <td>{{ gmdate('H:i:s', ($ranking->avg_test_time / 100)) }}</td>
                            <td>{{ number_format($ranking->avg_final_score, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        /* Estilo para a tabela */
        .ranking-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .ranking-table th, .ranking-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .ranking-table th {
            background-color: #f4f4f4;
        }

        /* Estilo para o 1º lugar (Dourado) */
        .bg-gold {
            background-color: #ffd700;  /* Cor dourada */
            color: black;
        }
    </style>
@endsection
