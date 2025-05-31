<!doctype html>
<html lang="pt-BR" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.145.0">
    <title>Coleção</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
    <meta name="theme-color" content="#712cf9">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg bg-primary fixed-top" data-bs-theme="dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">{{ Auth::user()->name }}</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('colecoes') }}">COLEÇÕES</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categorias') }}">CATEGORIAS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('prateleiras') }}">PRATELEIRAS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('figuras') }}">FIGURAS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">SAIR</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" style="margin-top: 80px;">
                @yield('conteudo')
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <nav class="navbar fixed-bottom bg-primary" data-bs-theme="dark">
            <div class="row">
                <div class="col-12">
                    <h5>COLEÇÕES - {{ date('Y') }}</h5>
                </div>
            </div>
        </nav>
    </div>
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">COLEÇÕES</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Deseja realmente sair?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                    <a href="{{ route('logoff') }}" class="btn btn-success">Sim</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
