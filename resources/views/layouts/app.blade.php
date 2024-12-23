<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Eugénio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="bg-light">
    <header class="container-fluid text-secondary text-white d-flex align-items-center p-3 mb-4 rounded-bottom shadow">
        <div class="d-flex align-items-center">
            <a href="/" style="text-decoration: none;">
                <div style="
   display: flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 70px;
    font-size: 2.3rem;
    font-weight: bold;
    color: white;
    background: #2c2c2c;
    border-radius: 50%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
                    <span>EG</span>
                </div>
            </a>
        </div>

        <h1 class="ms-3 fs-4 mb-0 ms-5 text-center flex-grow-1 text-dark">
            @yield('header', 'Circuito de Testes Eugénio')
        </h1>

<!-- Admin Button -->
        @if (Request::route()->getName() == 'home')
        <button id="admin" class="btn btn-warning rounded-pill px-4">Admin</button>

<!-- Sair Button -->

        @elseif (Request::route()->getName() == 'admin')
        <a href="@yield('return')">
            <button class="btn btn-danger rounded-pill px-4">@yield('button', 'Sair')</button>
        </a>
<!-- Voltar Button -->

        @else
        <a href="@yield('return')">
        <button class="btn btn-info rounded-pill px-4">@yield('button', 'Voltar')</button>
        </a>
        @endif

        <div id="formAdmin" class="d-flex justify-content-center align-items-center position-fixed top-0 start-0 w-100 h-100 d-none"
            style="background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(8px);">
            <form action="{{route('admin.validate')}}" method="post"
                class="d-flex flex-column justify-content-between align-items-center p-4 w-50 h-auto bg-white shadow-lg rounded">
                <h5 class="mb-4 text-dark fw-bold">Área Restrita - Admin</h5>
                <input type="password" name="admin_password"
                    class="form-control p-3 mb-3 w-75 border border-primary rounded"
                    placeholder="Digite sua senha">
                <div class="d-flex w-75 justify-content-between">
                    <button type="submit"
                        class="btn btn-success px-4 py-2 fw-bold rounded">Confirmar</button>
                    <button type="button"
                        class="btn btn-danger px-4 py-2 fw-bold rounded"
                        onclick="document.getElementById('formAdmin').classList.add('d-none');">Cancelar</button>
                </div>
            </form>
        </div>


        <script>
            document.getElementById('admin').addEventListener('click', function() {
                document.getElementById("formAdmin").classList.remove('d-none');
            })

            document.getElementById('formAdmin').addEventListener('click', function(e) {
                if (e.target === this) {
                    document.getElementById("formAdmin").classList.add('d-none');
                }
            });
        </script>

        <script>
            // Função para voltar à página anterior, com lógica para evitar voltar à página atual
            function goBack() {
                window.history.back(); // Volta para a página anterior
            }
        </script>


    </header>

    <main class="container">
        <div class="text-center mb-4">
            <h5 class="text-secondary border-bottom border-dark">@yield('instruction', 'Escolha uma opção')</h5>
        </div>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>