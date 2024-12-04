@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Escolha a configuração que deseja gerir')
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
    @foreach($configurations as $configuration)
        <div class="col-md-10 mb-2">
            <div class="d-flex align-items-center">
                <div class="p-2 py-3 mb-0 w-100 rounded border-success text-white text-center" style="background-color: #28a745;">
                    <h5 class="mb-0">{{$configuration->configuration_title}}</h5>
                </div>

                <div class="d-flex align-items-center ms-3">
                    <form action="{{ route('config.change', ['id' => $configuration->configuration_id]) }}" method="POST" class="me-2">
                    @csrf
                        <button class="btn btn-outline-secondary rounded-circle" type="submit" style="width: 40px; height: 40px;">
                            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                        </button>
                    </form>

                    <form action="{{ route('config.destroy', ['id' => $configuration->configuration_id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja apagar esta configuração?')">
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
        <form action="{{route('config.create')}}" method="POST">
            @csrf
            <div class="input-group mt-3 mb-5">
                <input type="text" class="form-control border border-success me-4 ms-0 rounded" name="config_name" placeholder="Nome da configuração" required>
                <button class="btn btn-success p-3 rounded-circle me-4" type="submit">
                    <i class="fas fa-plus" aria-hidden="true" style="width: 20px; height: 20px;"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
