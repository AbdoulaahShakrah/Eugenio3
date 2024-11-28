<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título da Página</title>
    <link href="https://unpkg.com/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body class="bg-gray-200">

<!--
<div class="main-menu-btn">
    <a href="/">
        <button type="button" class="mt-4 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-full">
            Ir para o Menu Inicial
        </button>
    </a>
</div>
-->
<div class="h1-title-container">
    <h1 class="md:text-6xl text-4xl font-bold text-blue-700 text-center mt-12">
        Escolher uma sessão
    </h1>
</div>

<div class="choose-session-main-container mx-auto p-8 bg-white rounded-lg shadow-lg lg:w-1/2 w-full mx-auto my-16">

    <?php
    if (isset($_GET['sessionId'])) {
        $selectedSessionId = $_GET['sessionId'];
        /*$selectedSessionName = $_GET['sessionName']*/
        ;
        ?>
    <div class="mb-4 text-green-600 font-bold">Sessão escolhida com sucesso<?php /*echo $selectedSessionName;*/ ?></div>
        <?php
    }
    ?>

    <form action="/setSession" method="GET" class="mb-10">
        <label for="sessionId" class="block text-gray-700 text-xl font-bold mb-2">Escolha uma Sessão:</label>
        <select id="sessionId" name="sessionId" class="w-full border p-2 rounded">
            <?php foreach ($sessions as $session): ?>
            <option value="<?php echo $session->PK_Sessao; ?>"><?php echo $session->Name; ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" id="confirmSessionBtn"
                class="mt-4 bg-green-500 hover:bg-green-600
                    text-white font-bold py-2 px-4 rounded-full float-right"
        >Abrir Sessão
        </button>
    </form>

</div>
</body>

</html>
