<?php
    require "config.php";
    require "select.php";
    require "funcoes.php";
    $base = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= $base ?>">
    <title>Lotus Spa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="icon" href="imgs/minilogolotus.png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/site/home">
                    <img src="imgs/logolotus.png" alt="logo lotus" width="100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/site/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/site/procedimentos">Procedimentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/site/ambiente">Ambiente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/site/sobre">Sobre</a>
                    </li>
                </ul>
                <form class="d-flex" role="pesquisa" action="/site/pesquisa" method="get">
                    <input class="form-control me-2" type="pesquisa" name="pesquisa" placeholder="Pesquisar procedimentos" aria-label="Search"/>
                    <button class="btn btn-outline-success" type="submit">Pesquisar procedimentos</button>
                </form>
                </div>
            </div>
        </nav>        
    </header>
    <main>
        <?php
            resgatarPagina();
        ?>
    </main>
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-3">LotusSpa</h5>
                    <p class="mb-0">Equilíbrio e bem-estar onde você estiver.</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <p class="fw-bold mb-3">Telefone</p>
                    <div class="mb-2">
                        <a href="https://wa.me/5544998944552" target="_blank" class="text-white text-decoration-none">
                            <i class="bi bi-whatsapp"></i> WhatsApp: (44) 99894-4552
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <p class="fw-bold mb-3">Redes Sociais</p>
                    <a href="https://www.instagram.com/lotus_nature_spa?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="btn btn-sm btn-outline-light me-2">
                        <i class="bi bi-instagram"></i> Instagram
                    </a>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">Desenvolvido por Brandon Yudi Sato - 2026</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>