<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Desafio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@1.8.3/dist/tailwind.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body class="bg-gray-200">

<div class="main-menu-btn">
    <a href="/">
        <button type="button" class="mt-4 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-full">
            Ir para o Menu Inicial
        </button>
    </a>
</div>

<div class="h1-title-container">
    <h1 class="md:text-6xl text-4xl font-bold text-blue-700 text-center mt-12">
        Desafio
    </h1>
</div>

<div class="main-container-desafio mx-auto p-8 bg-white rounded-lg shadow-lg lg:w-1/2 w-full mx-auto my-16">
    <div>
        <form action="{{ url('desafio') }}" method="get">
            @csrf
            <div class="mb-4">
                <?php
                echo '<label class="text-xl block font-bold mb-2">Configuração: ' . $configName . '</label>';
                ?>
            </div>
            <div class="mb-4">
                <label for="jogadores" class="text-xl block font-bold mb-2">Selecionar Jogadores / Equipas</label>
                <select name="jogadores" id="jogadores" class="w-full p-2 rounded border border-gray-400">
                    @foreach($jogadores as $jogador)
                        <option value="{{ $jogador->PK_Jogador }}">{{ $jogador->Nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                    Iniciar Desafio
                </button>
            </div>
        </form>
    </div>
</div>
</body>

</html>
