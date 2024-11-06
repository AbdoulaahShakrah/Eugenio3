<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>Resultado da configuração</title>
</head>

<body>
<div class="main-menu-btn">
    <a href="/">
        <button type="button" class="mt-4 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-full">
            Ir para o Menu Inicial
        </button>
    </a>
</div>
<div class="results-main-container p-4 md:p-8 lg:p-12">
    <div class="h1-title-container">
        <h1 class="text-4xl font-bold text-blue-700 text-center mt-1">
            Configuração {{ $Configuracao->PK_Configuracao }}</h1>
    </div>
    <div class="table-container overflow-x-auto">
        <table class="results-table rounded-lg border shadow-2xl w-full">
            <thead class="text-xl">
            <tr>
                <th>Jogador / Equipa</th>
                <th>Palavras por minuto</th>
                <th>Quantidade de erros</th>
                <th>Quantidade de certas</th>
                <th>Tempo</th>
                <th>Pontuação final</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $NomeJogador }}</td>
                <td>{{ $classificacao->WPM }}</td>
                <td>{{ $classificacao->QTD_Erros }}</td>
                <td>{{ $classificacao->QTD_Certas }}</td>
                <td>{{ $classificacao->Tempo }}</td>
                <td>{{ $classificacao->Pontuacao_Final }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <?php
        echo '<br>';
        echo '<p>Revisão do Texto do Desafio:</p>';
        echo '<p id="expected-text" class="text-gray-800 font-medium mt-5">' . $expectedTextWithStyles . '</p>';
        ?>
    </div>

    <div class="container">
        <div class="text-center mt-10">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full mt-6"
                    onclick="location.href='{{url('iniciar-desafio')}}'">Iniciar Desafio
            </button>
        </div>
    </div>
</div>
</body>

</html>
