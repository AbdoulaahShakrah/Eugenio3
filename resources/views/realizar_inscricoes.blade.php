<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://unpkg.com/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>Realizar Inscrições</title>
</head>

<body class="bg-gray-200">

<div class="main-menu-btn">
    <a href="/">
        <button type="button"
                class="mt-4 lg:mt-4 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-full">
            Ir para o Menu Inicial
        </button>
    </a>
</div>

<div class="h1-title-container">
    <h1 class="md:text-6xl text-2xl font-bold text-blue-700 text-center mt-12">
        Realizar Inscrições
    </h1>
</div>

<div class="main-container-desafio container mx-auto p-8 bg-white rounded-lg shadow-lg lg:w-1/2 my-16">
    <div class="w-full p-4 test">
        <div>
            <form action="{{ url('adicionarJogador') }}" method="POST" class="mb-10 ">
                @csrf
                <label for="nomeJogador" class="block text-gray-700 text-lg font-bold mb-2">Inserir nome de
                    Jogador/Equipa:</label>
                <input class="w-full border p-2 rounded mb-4" type="text" name="nomeJogador" id="nomeJogador"
                       placeholder="Nome" required>
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full float-right">
                    Inscrever
                </button>
            </form>
        </div>

        <hr class="mt-20">
        <div class="overflow-x-auto">
            <table class="my-10 w-full text-center rounded-lg overflow-hidden border">
                <thead class="bg-blue-700 text-4xl font-bold text-white">
                <tr>
                    <th class="sm:text-sm md:text-lg px-6 py-4">Inscritos</th>
                </tr>
                </thead>
                <tbody class="w-full rounded-lg divide-y divide-gray-300">
                @foreach($jogadores as $index => $jogador)
                    <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 transition">
                        <td class="text-3xl px-6 py-4">{{ $jogador->Nome }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="menu-btn-container">
        <a href="/iniciar-desafio"
           class="lg:float-right block w-full lg:w-auto bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full mt-4 lg:mt-0">
            Iniciar Desafio
        </a>
    </div>
</div>
</body>

</html>
