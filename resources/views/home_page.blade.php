@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de teste Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Selecione a sessão indicada')
@section('return', route('home'))

@section('content')
    <div class="row justify-content-center ms-5">
        @foreach($sessions as $session)
            <div class="col-md-10 mb-3">
                <div class="d-flex align-items-center">    
                    <div class="flex-grow-1 align-items-center me-3">
                    <button type="submit" id="Session{{$session->session_id}}" class="text-decoration-none p-2 py-4 mb-0 w-100 rounded border border-success text-white text-center" style="background-color: #28a745; border: none;">
                        <h5 class="mb-0">{{$session->session_name}}</h5>
                    </button>
                    </div>
                </div>

                
                <div id="form{{$session->session_id}}" class="d-flex justify-content-center align-items-center position-fixed top-0 start-0 w-100 h-100 d-none" style="background: rgba(220, 220, 220, 0.5); backdrop-filter: blur(5px);">
                    <form action="{{route('challenge.check_session_password')}}" method="post" class="d-flex flex-column justify-content-evenly align-items-center w-50 h-25 bg-secondary bg-gradient text-white text-center d-flex justify-content-center align-items-center">
                        <h5>Indique a password da Sessão {{$session->session_name}}</h5>
                        <input type="password" name="session_password" class="form-control p-2 py-3 w-75 border border-success rounded" placeholder="Password">
                        <input type="hidden" name="session_id" value="{{$session->session_id}}">
                        <div class="d-flex w-75 justify-content-evenly">
                        <button type="submit" class="h5 p-2 py-4 w-75 rounded border border-success text-white text-center bg-success">Confirmar</button>
                        <button class="h5 p-2 py-4 w-75 rounded border bg-danger text-white text-center">Cancelar</button>
                        </div>
                        
 
                    </form>
                </div>

                <script>
                    document.getElementById('Session{{$session->session_id}}').addEventListener('click', function(){
                        document.getElementById("form{{$session->session_id}}").classList.remove('d-none');
                    })

                    document.getElementById('form{{$session->session_id}}').addEventListener('click', function (e) {
                        if (e.target === this) {
                            document.getElementById("form{{$session->session_id}}").classList.add('d-none');
                        }
                    });
                </script>
            </div>
        @endforeach
    </div>
@endsection
