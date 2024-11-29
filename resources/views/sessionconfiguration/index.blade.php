@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('instruction', 'Gestão de Configurações da Sessão ' . $session->session_name)
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

<div class="container mt-4">
    <form action="{{ route('sessionconfiguration.update', ['session_id' => $session->session_id]) }}" method="POST" class="mb-5">
        @csrf
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Título da Configuração</th>
                        <th scope="col" class="text-center">Selecionar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($configs as $config)
                        <tr>
                            <input type="hidden" name="allConfigs[]" value="{{ $config->configuration_id }}">
                            <td>{{ $config->configuration_title }}</td>
                            <td class="text-center">
                                <input type="checkbox" name="selectedConfigs[]" value="{{ $config->configuration_id }}"
                                @foreach ($config->sessionConfigurations as $sessionConfiguration)
                                    @if ($sessionConfiguration->session_id == $session->session_id)
                                        checked="checked"
                                        @break
                                    @endif
                                @endforeach>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success px-4 py-2">
                <i class="fas fa-check-circle me-2"></i>Confirmar
            </button>
        </div>
    </form>
</div>

@endsection
