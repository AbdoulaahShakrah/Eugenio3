@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('return', route('home'))
@section('instruction', 'Selecione a Sessão')


@section('content')

<div class="w-100 d-flex flex-row justify-content-center align-items-center gap-3 mb-4">
    
<div class="row justify-content-center ms-5">
    @foreach($sessions as $session)
        <div class="col-md-10 mb-3">
            <div class="d-flex align-items-center">    
                <div class="flex-grow-1 align-items-center me-3">
                    <a href="{{ route('challenge.start.player', ['session_id' => $session->session_id ]) }}" class="text-decoration-none">
                        <h5 class="p-2 py-4 mb-0 w-100 rounded border border-success text-white text-center" style="background-color: #28a745;">{{$session->session_name}} </h5>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>



@endsection