<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Eugenio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body class="bg-light">
    <header class="container-fluid text-secondary text-white d-flex align-items-center p-3 mb-4 rounded-bottom shadow">
        <div class="d-flex align-items-center">
            <div class="bg-dark text-white "
                style="width: 100%; height: 100%; font-size: 2.3rem;">
                <span >EG</span>
            </div>
        </div>

        <h1 class="ms-3 fs-4 mb-0 text-center flex-grow-1 text-dark ">@yield('header', 'Circuito de Testes Eugênio')</h1>
        <button class="btn btn-success rounded-pill px-4">@yield('button', 'Voltar')</button>
    </header>

    <main class="container">
        <div class="text-center mb-4">
            <h5 class="text-secondary border-bottom border-dark">@yield('instruction', 'Escolha uma opção abaixo')</h5>
        </div>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>