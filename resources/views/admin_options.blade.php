@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de teste Eugénio')
@section('button')
@section('button')
    Sair
@endsection

@section('instruction', 'Selecione a opção desejada')
@section('return', route('home'))

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <form action="{{ route('handleButtons') }}" method="POST" class="col-md-10 mb-2 me-3">
        @csrf
        <button class="btn btn-success col-md-11 mb-4 py-3 ms-5" style="background-color:rgb(5, 32, 234); font-size: 24px;" type="submit" name="action" value="sessions">Gerir Sessões</button>
        <button class="btn btn-success col-md-11 mb-4 py-3 ms-5" style="background-color: rgb(5, 32, 234); font-size: 24px;" type="submit" name="action" value="configs">Gerir Configurações</button>
        <!--<button class="btn btn-success col-md-11 mb-4 py-3 ms-5" style="background-color: #28a745; font-size: 24px;" type="submit" name="action" value="results">Visualizar Resultados</button>-->
    </form>
</div>
@endsection