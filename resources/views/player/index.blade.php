@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Lista de jogadores')
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

<div class="row justify-content-center">
    @foreach($players as $player)
    <div class="col-md-10 mb-0">
        <div class="d-flex justify-content-between align-items-center p-3 border border-light rounded">
            <div class="flex-grow-1 p-2 rounded text-white py-3 text-center" style="background-color: #28a745;">
                    <h5 id="playerName{{$player->player_id}}" class="mb-0">{{$player->player_name}}</h5>        
            </div>

            <div class="d-flex align-items-center ms-3">
                <form action="{{ route('player.edit')}}" method="POST" class="me-2">
                    @method('patch')
                    <button id="buttonEdit{{$player->player_id}}" class="btn btn-outline-secondary rounded-circle" style="width: 40px; height: 40px;">
                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                    </button>
                    <input type="hidden" name="session_id" value="{{$player->session_id}}">
                    <input type="hidden" name="id" value="{{$player->player_id}}">
                    <input type="text" name="name" id="writeName{{$player->player_id}}" class="mb-0 d-none" placeholder="Nome" value="{{$player->player_name}}">

                    <button id="buttonConfirmEdit{{$player->player_id}}"  class="btn btn-outline-success rounded-circle d-none" type="submit" style="width: 40px; height: 40px;">
                        <i class="fas fa-check"></i>
                    </button>  
                </form>

                <script>
                    document.getElementById("buttonEdit{{$player->player_id}}").addEventListener("click", function() {
                        event.preventDefault(); // necessário. Sem isto é feito submit ao clicar no butão editar.
                        document.getElementById("buttonConfirmEdit{{$player->player_id}}").classList.remove('d-none');
                        document.getElementById("buttonEdit{{$player->player_id}}").classList.add('d-none');
                        document.getElementById("playerName{{$player->player_id}}").classList.add('d-none');
                        document.getElementById("writeName{{$player->player_id}}").classList.remove('d-none');

                    });
                </script>
                
                <form action="{{ route('player.destroy', ['id1' => request()->route('id'), 'id2' => $player->player_id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar este jogador?')">
                @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger rounded-circle" type="submit" style="width: 40px; height: 40px;">
                        <i class="fas fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <div class="col-md-10 mb-0">
        <form action="{{route('player.store', ['id' => request()->route('id')] )}}" method="POST">
            @csrf
            <div class="input-group mt-3 mb-5">
                <input type="text" class="form-control border border-success me-5  ms-3 rounded" name="player_name" placeholder="Nome do jogador" required>
                <button class="btn btn-success p-3 rounded-circle me-3" type="submit">
                    <i class="fas fa-plus" aria-hidden="true" style="width: 20px; height: 20px;"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection