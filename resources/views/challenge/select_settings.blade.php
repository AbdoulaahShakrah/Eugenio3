@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
<div class="d-flex justify-content-center color bg-danger">
    @yield('button')
</div>
@section('return', route('home'))
@section('instruction', 'Seleção de Testes')

@section('content')

<div class="row justify-content-center">
    <form action="{{route('challenge.validate')}}" method="post" class="w-100">
        <input type="hidden" name="session_id" value="{{$session->session_id}}">

        <!-- Config Settings -->
        <div id="configSettings" class="d-flex flex-column align-items-center w-100 border border-success p-4">
            <h1>Escolha a configuração</h1>
            <hr class="w-75 border border-secondary mt-0 mb-5">

            <select name="config_id" id="configSelect" class="custom-select border-2 border-success btn button-success w-75 mb-3 py-3 rounded-lg font-weight-bold">
                <option value="" disabled selected>Seleciona aqui a configuração</option>
                @foreach($configs as $config)
                <option value="{{$config->configuration_id}}" class="option-style py-3">{{$config->configuration_title}}</option>
                @endforeach
            </select>

            <div class="w-75 d-flex justify-content-between mt-4">
                <button id="configConfirm" class="btn btn-success flex-grow-1 me-2 py-3"
                    @if(isset($configuration))
                    disabled
                    @endif>Confirmar</button>
            </div>

            <script>
                document.getElementById('configSelect').addEventListener('change', function() {
                    document.getElementById("configConfirm").disabled = false;
                });

                document.getElementById('configConfirm').addEventListener('click', function(event) {
                    event.preventDefault();
                    document.getElementById('configSettings').classList.add('d-none');
                    document.getElementById('playerSettings').classList.remove('d-none');
                });
            </script>
        </div>

        <!-- Player Settings -->
        <div id="playerSettings" class="d-flex flex-column align-items-center w-100 border border-success p-4 d-none">
            <h1>Escolha o Jogador</h1>
            <hr class="w-75 border border-secondary mt-0 mb-5">

            <select name="player_id" id="playerSelect" class="custom-select border-2 border-success btn button-success w-75 mb-3 py-3 rounded-lg font-weight-bold">
                <option value="" disabled selected>Seleciona aqui o Jogador</option>
                @foreach($players as $player)
                <option value="{{$player->player_id}}" class="option-style py-3">{{$player->player_name}}</option>
                @endforeach
            </select>

            <div class="w-75 d-flex justify-content-between mt-4">
                <button id="playerConfirm" class="btn btn-success flex-grow-1 me-2 py-3" disabled>Confirmar</button>
            </div>

            <script>
                document.getElementById('playerSelect').addEventListener('change', function() {
                    document.getElementById("playerConfirm").disabled = false;
                });

                document.getElementById('playerConfirm').addEventListener('click', function(event) {
                    event.preventDefault();

                    document.getElementById("playerSpan").innerText = document.getElementById('playerSelect').options[document.getElementById('playerSelect').selectedIndex].text;
                    document.getElementById("configSpan").innerText = document.getElementById('configSelect').options[document.getElementById('configSelect').selectedIndex].text;

                    document.getElementById('playerSettings').classList.add('d-none');
                    document.getElementById('confirmSettings').classList.remove('d-none');
                });

                document.getElementById('playerCancel').addEventListener('click', function(event) {
                    event.preventDefault();
                    document.getElementById('playerSettings').classList.add('d-none');
                    document.getElementById('configSettings').classList.remove('d-none');
                });
            </script>
        </div>

        <!-- Confirm Settings -->
        <div id="confirmSettings" class="d-flex flex-column align-items-center w-100 border border-success p-4 d-none">
            <h2>Dados do Teste:</h2>

            <!-- Linha para exibir o nome do Jogador e Configuração lado a lado -->
            <div class="row w-100 mb-4">
                <!-- Nome do Jogador -->
                <div class="col-md-6 mb-3">
                    <h3 class="h5 p-3 rounded border border-success text-center">
                        <strong>Nome de Jogador: </strong><span id="playerSpan"></span>
                    </h3>
                </div>

                <!-- Nome da Configuração -->
                <div class="col-md-6 mb-3">
                    <h3 class="h5 p-3 rounded border border-success text-center">
                        <strong>Nome de Configuração: </strong><span id="configSpan"></span>
                    </h3>
                </div>
            </div>

            <!-- Botões de Cancelar e Confirmar -->
            <div class="w-75 d-flex justify-content-between mt-4">
                <button id="confirmCancel" class="btn btn-danger flex-grow-1 me-2 py-3">Cancelar</button>
                <button type="submit" id="confirmConfirm" class="btn btn-success flex-grow-1 me-2 py-3">Confirmar</button>
            </div>

            <script>
                document.getElementById('confirmCancel').addEventListener('click', function(event) {
                    event.preventDefault();
                    document.getElementById('confirmSettings').classList.add('d-none');
                    document.getElementById('playerSettings').classList.remove('d-none');
                });
            </script>
        </div>


    </form>
</div>

@if(session('config_id'))
<script>
    // Seleciona o dropdown
    const configSelect = document.getElementById('configSelect');

    configSelect.value = "{{session('config_id')}}";

    const configSettings = document.getElementById('configSettings');
    configSettings.classList.add('d-none');

    const playerSettings = document.getElementById('playerSettings');
    playerSettings.classList.remove('d-none');
</script>
@endif
@endsection