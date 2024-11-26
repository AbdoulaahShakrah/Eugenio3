@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Escolha a sessão que deseja gerir')
@section('return', route('home'))


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
            <form action="{{ route('session.update') }}" method="POST" class="d-flex flex-grow-1 flex-row align-items-center">
                @method('patch')

                <input type="hidden" name="id" value="{{$session->session_id}}">

                <div class="flex-grow-1 align-items-center me-3">
                    <a id="sessionName{{$session->session_id}}" href="/v3/sessions/sessionPlayers/{{$session->session_id}}" class="text-decoration-none">
                        <h5 class="p-2 py-3 mb-0 w-100 rounded border border-success text-white text-center" style="background-color: #28a745;">{{$session->session_name}} </h5>
                    </a>
                    <input type="text" name="name" id="writeName{{$session->session_id}}" class="form-control p-2 py-3 w-100 border border-success rounded text-center d-none" placeholder="Nome" value="{{$session->session_name}}">
                </div>



                <button id="buttonEdit{{$session->session_id}}" class="btn btn-outline-secondary rounded-circle me-1">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                </button>
                
            
                <button id="buttonConfirmEdit{{$session->session_id}}"  class="btn btn-outline-success rounded-circle me-1 d-none">
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
                <button class="btn btn-outline-danger rounded-circle" type="submit">
                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>
    @endforeach

    <div class="col-md-10 mb-0">
        <form action="{{route('session.store')}}" method="POST">
            @csrf
            <div class="input-group mt-3 mb-5 d-flex flex-row justify-content-center align-items-center">
                <input type="text" class="form-control p-2 py-3 flex-grow-1 border border-success rounded text-center me-5" name="session_name" placeholder="Nome da sessão" required>
                <button class="btn btn-success p-3 rounded-circle" type="submit">
                    <i class="fas fa-plus" aria-hidden="true" style="width: 20px; height: 20px;"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection