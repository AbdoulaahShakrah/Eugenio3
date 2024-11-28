<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>Circuito de Testes Eugénio</title>
</head>

<body class="bg-gray-200">

<div class="first-container">
    <div class="logo-container">
        <a href="/"><img src="{{ asset('images/00-ÍconeEugénio.png') }}" class="custom-logo" alt="Eugenio Logo"/></a>
    </div>

    <div class="h1-title-container">
        <h1 class="md:text-6xl text-4xl font-bold text-blue-700 text-center border-test">
            Circuito de Testes Eugénio
        </h1>
    </div>

    <div class="end-session-container">
        @if(session()->has('sessionId'))
        <div style="color: #336699; font-size: 16px; font-weight: bold;">
                Sessão: {{ session('sessionName') }}
        </div>


            <div>
                <button type="submit" id="getSessionsBtn" class="end-session-button"
                        onclick="location.href='/clearSession'">Terminar Sessão
                </button>
            </div>
        @endif
    </div>
</div>

<div class="main-container-options container mx-auto h-full mt-10">
    <div class="container mx-auto text-center">
        
        <?php
        if (session()->has('sessionId')) {
            
            echo '<button id="realizar-inscricoes-button" class="text-white font-bold py-2 px-4 rounded-full"
                    onclick="location.href=\'' . url('realizar-inscricoes') . '\'">Realizar Inscrições</button>';
            echo '<button class="text-white font-bold py-2 px-4 rounded-full"
                    onclick="location.href=\'' . url('iniciar-desafio') . '\'">Iniciar Desafio</button>';
            echo '<button class="text-white font-bold py-2 px-4 rounded-full"
                    onclick="location.href=\'' . url('ver-resultados') . '\'" >Ver Resultados</button>';
        } else {
            echo '<button type="submit" id="create-session-button"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">Criar Sessão</button>';
            echo '<button type="submit" id="getSessionsBtn"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full"
                    onclick="location.href=\'/getSessions\'">Escolher Sessão</button>';
        }
        ?>
        <button id="configBtn" class="font-bold py-2 px-4 rounded-full" onclick="location.href='/getAllConfigs'">
            Configurações
        </button>
    </div>
</div>
<script src="{{ asset('js/home_scripts.js') }}"></script>
<script>session()</script>
</body>

</html>
