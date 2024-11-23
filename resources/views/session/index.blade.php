@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Escolha a sessão que deseja gerir')
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

<div class="row justify-content-center">
    @foreach($sessions as $session)
    <div class="col-md-10 mb-0">
        <div class="d-flex justify-content-between align-items-center p-3 border border-light rounded">
            <div class="flex-grow-1 p-2 rounded text-white py-3 text-center" style="background-color: #28a745;">
                <a href="/v3/sessions/sessionPlayers/{{$session->session_id}}" class="text-decoration-none text-white">
                    <h5 class="mb-0">{{$session->session_name}} </h5>
                </a>
            </div>

            <div class="d-flex align-items-center ms-3">
                <form action="#" method="GET" class="me-2">
                    <button class="btn btn-outline-secondary rounded-circle" type="submit" style="width: 40px; height: 40px;">
                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                    </button>
                </form>
                
                <form action="{{ route('session.destroy', ['id' => $session->session_id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar esta sessão?')">
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

    <div class="col-md-10 ms-0">
        <form action="{{route('session.store')}}" method="POST">
            @csrf
            <div class="input-group mt-3 mb-5">
                <input type="text" class="form-control border border-success me-5 ms-3 rounded" name="session_name" placeholder="Nome da sessão" required>
                <button class="btn btn-success p-3 rounded-circle me-3" type="submit">
                    <i class="fas fa-plus" aria-hidden="true" style="width: 20px; height: 20px;"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection