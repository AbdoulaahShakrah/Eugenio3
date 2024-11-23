@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de teste Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Selecione a opção desejada')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <form action="/v3" method="POST" class="w-100">
        @csrf
        <button class="btn btn-success w-100 mb-4 py-4" style="background-color: #28a745;" type="submit" name="action" value="sessions">Gerir Sessões</button>
        <button class="btn btn-success w-100 mb-4 py-4" style="background-color: #28a745;" type="submit" name="action" value="configs">Gerir Configurações</button>
        <button class="btn btn-success w-100 mb-4 py-4" style="background-color: #28a745;" type="submit" name="action" value="start">Correr Desafio</button>
        <button class="btn btn-success w-100 mb-4 py-4" style="background-color: #28a745;" type="submit" name="action" value="results">Visualizar Resultados</button>
    </form>
</div>
@endsection
