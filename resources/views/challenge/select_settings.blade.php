@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('return', route('home'))
@section('instruction', 'Seleção de Testes')


@section('content')

<div class="w-100 d-flex flex-row justify-content-end align-items-end mb-4">
    <div class="w-100 border border-success position-relative">
        <progress id="file" value="0" max="100" class="w-100 flex-grow-1 py-4"></progress>
        <div class="position-absolute top-0 start-0">O</div>
    </div>

    
    <script>
        function animateProgress(start, end) {
            const progressBar = document.getElementById('file');
            if(start < end){
                start++;
                progressBar.value = start;
                setTimeout(() => animateProgress(start, end), 20);

            }
            if(start > end){
                start--;
                progressBar.value = start;
                setTimeout(() => animateProgress(start, end), 20);

            }
        }
        animateProgress(0, 33);
    </script>

</div>

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
                <button id="configConfirm" class="btn btn-success flex-grow-1 me-2 py-3" disabled>Confirmar</button>
            </div>

            <script>
                document.getElementById('configSelect').addEventListener('change', function(){
                    document.getElementById("configConfirm").disabled =false;
                })


                document.getElementById('configConfirm').addEventListener('click', function(){
                    event.preventDefault();
                    document.getElementById('configSettings').classList.add('d-none');
                    document.getElementById('playerSettings').classList.remove('d-none');
                    animateProgress(33, 66);
                })
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
                <button id="playerCancel" class="btn btn-danger flex-grow-1 me-2 py-3">Cancelar</button>
                <button id="playerConfirm" class="btn btn-success flex-grow-1 me-2 py-3" disabled>Confirmar</button>
            </div>

            <script>
                document.getElementById('playerSelect').addEventListener('change', function(){
                    document.getElementById("playerConfirm").disabled =false;
                })


                document.getElementById('playerConfirm').addEventListener('click', function(){
                    event.preventDefault();

                    document.getElementById("playerSpan").innerText = document.getElementById('playerSelect').options[document.getElementById('playerSelect').selectedIndex].text;
                    document.getElementById("configSpan").innerText = document.getElementById('configSelect').options[document.getElementById('configSelect').selectedIndex].text;


                    document.getElementById('playerSettings').classList.add('d-none');
                    document.getElementById('confirmSettings').classList.remove('d-none');
                    animateProgress(66, 100);
                })

                document.getElementById('playerCancel').addEventListener('click', function(){
                    event.preventDefault();
                    document.getElementById('playerSettings').classList.add('d-none');
                    document.getElementById('configSettings').classList.remove('d-none');
                    animateProgress(66, 33);
                })
            </script>
        </div>


        <!-- Confirm Settings -->
        <div id="confirmSettings" class="d-flex flex-column align-items-center w-100 border border-success p-4 d-none">
            <h2>Dados do Teste:</h2>
            <h3 class="h5 p-2 py-4 mb-3 w-100 rounded border border-success text-center"><strong>Nome de Sessão: </strong><span id="sessionSpan">{{$session->session_name}}</span></h3>
            <h3 class="h5 p-2 py-4 mb-3 w-100 rounded border border-success text-center"><strong>Nome de Jogador: </strong><span id="playerSpan"></span></h3>
            <h3 class="h5 p-2 py-4 mb-3 w-100 rounded border border-success text-center"><strong>Nome de Configuração: </strong><span id="configSpan"></span></h3>

            <div class="w-75 d-flex justify-content-between mt-4">
                <button id="confirmCancel" class="btn btn-danger flex-grow-1 me-2 py-3">Cancelar</button>
                <button type="submit" id="confirmConfirm" class="btn btn-success flex-grow-1 me-2 py-3">Confirmar</button>
            </div>

            <script>

                document.getElementById('confirmCancel').addEventListener('click', function(){
                    event.preventDefault();
                    document.getElementById('confirmSettings').classList.add('d-none');
                    document.getElementById('playerSettings').classList.remove('d-none');
                    animateProgress(100, 66);
                })
            </script>
        </div>



    </form>
</div>



@endsection
