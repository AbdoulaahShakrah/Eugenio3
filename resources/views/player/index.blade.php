@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Lista de jogadores')
@section('return', route('sessions.index'))
@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert" 
        style="position: fixed; top: 15px; left: 75%; transform: translateX(-50%); z-index: 1050; width: auto; max-width: 80%;">
        <i class="fas fa-check-circle me-2"></i>
        <strong>Sucesso!</strong> {{ session('success') }}
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

@if (session('editSucess'))

    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert" 
        style="position: fixed; top: 15px; left: 75%; transform: translateX(-50%); z-index: 1050; width: auto; max-width: 80%;">
        <i class="fas fa-check-circle me-2"></i>
        <strong>{{session('editSucess') }}</strong> {{ session('success') }}
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

<div class="row justify-content-center ms-5">
    @foreach($players as $player)
        <div class="col-md-10 mb-2">
            <div class="d-flex align-items-center">
                <form action="{{ route('player.edit')}}" method="POST" class="d-flex flex-grow-1 flex-row align-items-center">
                    @method('patch')
                    <div class="input-group flex flex-row align-items-center justify-content-center">

                        <input type="hidden" name="session_id" value="{{$player->session_id}}">
                        <input type="hidden" name="id" value="{{$player->player_id}}">

                        <div class="flex-grow-1 align-items-center me-3">
                            <h5 id="playerName{{$player->player_id}}" class="p-2 py-3 mb-0 w-100 rounded border border-success text-white text-center" style="background-color: #28a745;">{{$player->player_name}}</h5>
                            <input type="text" name="name" id="writeName{{$player->player_id}}" class="form-control p-2 py-3 w-100 border border-success rounded text-center d-none" placeholder="Nome" value="{{$player->player_name}}">
                        </div>     
                        
                        <button id="buttonEdit{{$player->player_id}}" class="btn btn-outline-secondary rounded-circle me-1">
                            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                        </button>
                        
                        <button id="buttonConfirmEdit{{$player->player_id}}"  class="btn btn-outline-success rounded-circle me-1 d-none" type="submit" >
                            <i class="fas fa-check"></i>
                        </button>  
                    </div>

                    <script>
                        document.getElementById("buttonEdit{{$player->player_id}}").addEventListener("click", function() {
                            event.preventDefault(); // necessário. Sem isto é feito submit ao clicar no butão editar.
                            document.getElementById("buttonConfirmEdit{{$player->player_id}}").classList.remove('d-none');
                            document.getElementById("buttonEdit{{$player->player_id}}").classList.add('d-none');
                            document.getElementById("playerName{{$player->player_id}}").classList.add('d-none');
                            document.getElementById("writeName{{$player->player_id}}").classList.remove('d-none');

                        });
                    </script>
                </form>
                
                <form action="{{ route('player.destroy', ['id1' => request()->route('id'), 'id2' => $player->player_id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar este jogador?')" class="d-flex justify-content-center align-items-center ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger rounded-circle" type="submit">
                        <i class="fas fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
    </div>
    @endforeach

    <div class="col-md-10 mb-0">
        <form action="{{route('player.store', ['id' => request()->route('id')] )}}" method="POST">
            @csrf
            <div class="input-group mt-3 mb-5 d-flex flex-row justify-content-center align-items-center">
                <input type="text" class="form-control p-2 py-3 flex-grow-1 border border-success rounded text-center me-5" name="player_name" placeholder="Nome do jogador" required>
                <button class="btn btn-success p-3 rounded-circle" type="submit">
                    <i class="fas fa-plus" aria-hidden="true" style="width: 20px; height: 20px;"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection