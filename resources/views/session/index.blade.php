@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Gestão de Sessões')
@section('return', route('admin'))

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

<div class="row justify-content-center ms-5">
    @foreach($sessions as $session)
    <div class="col-md-10 mb-2">
        <div class="d-flex align-items-center">
        <a class="me-3" href="{{route('final-results', ['session_id' => $session->session_id])}}">
            <button class="btn btn-warning rounded-circle me-1 btn-lg">
                <i class="fa fa-trophy"></i>
            </button>
        </a>
            <form action="{{ route('session.update') }}" method="POST" class="d-flex flex-grow-1 flex-row align-items-center">
                @method('patch')
                <input type="hidden" name="id" value="{{$session->session_id}}">
                
                <div id="sessionName{{$session->session_id}}" class="d-flex flex-grow-1 align-items-center me-2 rounded border border-success" style="background-color: #28a745; min-height: 65px;">
                    <div class="d-flex flex-column justify-content-center flex-grow-1 p-2">
                        <h4 class="text-white mb-0"><strong>{{$session->session_name}}</strong></h4>
                        <p class="text-white fs-6 fw-lighter mb-0">Password: {{$session->session_password}}</p>
                    </div>

                    <a class="px-3 text-white small mb-0" href="/v3/sessions/sessionPlayers/{{$session->session_id}}">Jogadores</a>
                    <a class="px-3 text-white small mb-0" href="{{ route('sessionconfig.index', ['session_id' => $session->session_id ]) }}">Configurações</a>

                </div>

                <input type="text" name="name" id="writeName{{$session->session_id}}" class="form-control flex-grow-1 me-2 p-2 py-3  border border-success rounded text-center d-none" style="height: 50px;" placeholder="Nome" value="{{$session->session_name}}">

                <button id="buttonEdit{{$session->session_id}}" class="btn btn-outline-secondary btn-lg rounded-circle me-2">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                </button>
                
                <button id="buttonConfirmEdit{{$session->session_id}}"  class="btn btn-outline-success btn-lg rounded-circle me-2 d-none">
                    <i class="fas fa-check"></i>
                </button>
            </form>

            <script>
                document.getElementById("buttonEdit{{$session->session_id}}").addEventListener("click", function() {
                    event.preventDefault(); // necessário. Sem isto é feito submit ao clicar em editar.
                    document.getElementById("buttonConfirmEdit{{$session->session_id}}").classList.remove('d-none');
                    document.getElementById("buttonEdit{{$session->session_id}}").classList.add('d-none');
                    document.getElementById("sessionName{{$session->session_id}}").classList.add('d-none');
                    document.getElementById("writeName{{$session->session_id}}").classList.remove('d-none');
                });
            </script>
            
            <form action="{{ route('session.destroy', ['id' => $session->session_id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar esta sessão?')" class="d-flex justify-content-center align-items-center ms-2">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-lg rounded-circle" type="submit">
                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>
    @endforeach

    <div class="col-md-10 mb-0" style="margin-left: 150px">
        {{ $sessions->links('pagination::bootstrap-4') }}
    </div>
    

    <div class="col-md-10 mb-0">
        <form action="{{route('session.store')}}" method="POST">
            @csrf
            <div class="input-group mt-3 mb-5">
                <input type="text" class="form-control border border-success me-4 ms-0 rounded" name="session_name" placeholder="Nome da sessão" required>
                
                <button class="btn btn-success p-3 rounded-circle me-4" type="submit">
                    <i class="fas fa-plus" aria-hidden="true" style="width: 20px; height: 20px;"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection