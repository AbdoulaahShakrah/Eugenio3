@extends('layouts.app')

@section('title', 'Circuito Eugenio')

@section('header', 'Circuito de Testes Eugênio')

@section('button', 'Voltar')

@section('instruction', 'Lista dos jogadores')

@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="row justify-content-center">
    @foreach($players as $player)
    <div class="col-md-10 mb-3">
        <div class="d-flex justify-content-between align-items-center p-3 border border-light rounded">
            <div class="flex-grow-1 p-2 rounded text-white py-3 text-center" style="background-color: #28a745;">
                    <h5 class="mb-0">{{$player->player_name}}</h5>
            </div>
            <div class="d-flex align-items-center ms-3">
                <form action="#" method="GET" class="me-2">
                    <button class="btn btn-outline-secondary rounded-circle" type="submit" style="width: 40px; height: 40px;">
                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                    </button>
                </form>
                <form action="#" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar esta sessão?')">
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

    <div class="col-md-10 mb-5">
        <form action="{{route('player.store', ['id' => request()->route('id')] )}}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control border border-success" name="player_name" placeholder="Nome do jogador" required>
                <button class="btn btn-success" type="submit">
                    <i class="fas fa-plus" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection