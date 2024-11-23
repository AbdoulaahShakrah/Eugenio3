@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Definir os campos da configuração')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10 ms-0">
        <form action="{{ route('config.store') }}" method="POST">
            @csrf
            <div class="input-group mt-3 mb-4">
                <input type="text" 
                    class="form-control border border-success me-5  ms-3 rounded" 
                    style="height: 50px;" 
                    name="configuration_title" 
                    value="{{ old('config_name', $config_name) }}" required>
            </div>

            <div class="input-group mt-3 mb-4">
                <input type="time" 
                    class="form-control border border-success me-5 ms-3 rounded" 
                    style="height: 50px;" 
                    name="configuration_time" 
                    value="00:05" required>
            </div>

            <div class="input-group mt-3 mb-4">
                <textarea class="form-control border border-success me-5 ms-3 rounded" 
                        name="configuration_text" 
                        placeholder="Texto a apresentar ao utilizador" 
                        style="resize: both; height: auto; min-height: 100px;" 
                        required></textarea>
            </div>

            <div class="input-group mt-3 mb-4">
                <button class="form-control border border-success me-5 ms-3 rounded text-white"
                    style="background-color: #28a745; height: 50px;" 
                    type="submit" >Guardar
                </button>  
            </div>
        </form>
    </div>
</div>

@endsection
