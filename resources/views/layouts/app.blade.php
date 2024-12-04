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
            <div class="bg-dark text-white "
                style="width: 100%; height: 100%; font-size: 2.3rem;">
                <span >EG</span>
            </div>
        </div>

        <h1 class="ms-3 fs-4 mb-0 ms-5 text-center flex-grow-1 text-dark ">@yield('header', 'Circuito de Testes Eugénio')</h1>
        @if (Request::route()->getName() == 'home')
            <button id="admin"class="btn btn-warning rounded-pill px-4">Admin</button>
        @else
            <a href="@yield('return')">
                <button class="btn btn-success rounded-pill px-4" onclick="goBack()">@yield('button', 'Voltar')</button>
            </a>
        @endif
        
        <div id="formAdmin" class="d-flex justify-content-center align-items-center position-fixed top-0 start-0 w-100 h-100 d-none" style="background: rgba(220, 220, 220, 0.5); backdrop-filter: blur(5px);">
            <form action="{{route('admin.validate')}}" method="post" class="d-flex flex-column justify-content-evenly align-items-center w-50 h-25 bg-secondary bg-gradient text-white text-center d-flex justify-content-center align-items-center">
                <h5>Zona Reservada - Senha de Admin</h5>
                <input type="password" name="admin_password" class="form-control p-2 py-3 w-75 border border-success rounded" placeholder="Password">
                <div class="d-flex w-75 justify-content-evenly">
                <button type="submit" class="h5 p-2 py-4 w-75 rounded border border-success text-white text-center bg-success">Confirmar</button>
                <button class="h5 p-2 py-4 w-75 rounded border bg-danger text-white text-center">Cancelar</button>
                </div>
            </form>
        </div>

        <script>
            document.getElementById('admin').addEventListener('click', function(){
                document.getElementById("formAdmin").classList.remove('d-none');
            })

            document.getElementById('formAdmin').addEventListener('click', function (e) {
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