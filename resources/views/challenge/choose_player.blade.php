@extends('layouts.app')
@section('title', 'Circuito Eugénio')
@section('header', 'Circuito de Testes Eugénio')
@section('button', 'Voltar')
@section('return', route('home'))
@section('instruction', 'Configuração de testes')


@section('content')

<div class="w-100 d-flex flex-row justify-content-center align-items-center gap-3 my-5">
    <h5><strong>Progesso:</strong></h5>
    <progress id="file" value="25" max="100" class="flex-grow-1 py-4"> 0% </progress>
    <script>
        const progressBar = document.getElementById('file');
        let progress = 25;

        function animateProgress() {
            if (progress < 50) {
                progress++;
                progressBar.value = progress;
                progressBar.textContent = `${progress}%`; // Update the visible percentage (if supported)
                setTimeout(animateProgress, 10); // Adjust the time (50ms) for desired speed
            }
        }

        // Start the animation
        animateProgress();
    </script>
</div>

<div class="row justify-content-center ms-5">
    @foreach($players as $player)
        <div class="col-md-10 mb-3">
            <div class="d-flex align-items-center">    
                <div class="flex-grow-1 align-items-center me-3">
                    <a href="{{ route('challenge.start.config', ['session_id' => $player->session_id, 'player_id' => $player->player_id ]) }}" class="text-decoration-none">
                        <h5 class="p-2 py-4 mb-0 w-100 rounded border border-success text-white text-center" style="background-color: #28a745;">{{$player->player_name}} </h5>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>




@endsection

