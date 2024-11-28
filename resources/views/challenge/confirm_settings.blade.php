@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('return', route('home'))
@section('instruction', 'Configuração do Teste')


@section('content')

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="successAlert" 
        style="position: fixed; top: 15px; left: 75%; transform: translateX(-50%); z-index: 1050; width: auto; max-width: 80%;">
        <i class="fa fa-x"></i>
        <strong>Erro!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>

    <script>
        setTimeout(function() {
            var alert = document.getElementById('successAlert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
            }
        }, 5000); // 5000 ms = 5 segundos
    </script>
@endif

<div class="w-100 d-flex flex-row justify-content-center align-items-center gap-3 mb-4">
    <h5><strong>Progesso:</strong></h5>
    <progress id="file" value="25" max="100" class="flex-grow-1 py-4"> 0% </progress>
    <script>
        const progressBar = document.getElementById('file');
        let progress = 75;

        function animateProgress() {
            if (progress < 100) {
                progress++;
                progressBar.value = progress;
                progressBar.textContent = `${progress}%`;
                setTimeout(animateProgress, 10); 
            }
        }

        animateProgress();
    </script>
</div>

<h2>Dados do Teste:</h2>
<h3 class="h5 p-2 py-4 mb-3 w-100 rounded border border-success text-center"><strong>Nome de Sessão: </strong>{{$session->session_name}}</h3>
<h3 class="h5 p-2 py-4 mb-3 w-100 rounded border border-success text-center"><strong>Nome de Jogador: </strong>{{$player->player_name}}</h3>
<h3 class="h5 p-2 py-4 mb-3 w-100 rounded border border-success text-center"><strong>Nome de Configuração: </strong>{{$config->configuration_title}}</h3>
<form action="{{ route('challenge', ['player_id' => $player->player_id, 'config_id' => $config->configuration_id, 'session_id' => $session->session_id]) }}" method="GET">
    <button type="submit" class="h5 p-2 py-4 mb-0 w-100 rounded border border-success text-white text-center" style="background-color: #28a745;">Confirmar</button>
</form>

@endsection
