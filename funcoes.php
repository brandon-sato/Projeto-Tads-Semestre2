<?php
function resgatarPagina(){
    if (isset($_GET['page'])) {
         $page = $_GET['page'];
    } elseif (isset($_GET['param'])) {
        $param = explode('/', trim($_GET['param'], '/'));
        $page = $param[0] ?: 'home';
    } else {
        $page = 'home';
    }
    if (file_exists("paginas/$page.php")) {
        include("paginas/$page.php");
    } else {
        include("paginas/erro.php");
    }
}

function buscarProcedimentos(array $procedimentos, string $pesquisa): array {
    $pesquisa = trim((string)$pesquisa);
    if ($pesquisa === '') {
        return $procedimentos;
    }

    $needle = mb_strtolower($pesquisa);
    $result = [];

    foreach ($procedimentos as $p) {
        $haystack = mb_strtolower(
            (($p->procedimento_nome ?? '') . ' ' . ($p->categoria_nome ?? '') . ' ' . ($p->profissionais ?? '')),
            'UTF-8'
        );

        if (mb_stripos($haystack, $needle, 0, 'UTF-8') !== false) {
            $result[] = $p;
        }
    }

    return $result;
}


function linkAgendarWhatsApp(string $procedimentoName): string {
    $message = 'Olá, gostaria de agendar o procedimento: ' . trim($procedimentoName);
    return 'https://wa.me/5544998944552?text=' . $message;
}

function exibirCardProcedimento(object $procedimento): void {
    $url = (linkAgendarWhatsApp($procedimento->procedimento_nome));
    $nome = $procedimento->procedimento_nome;
    $descricao = nl2br($procedimento->descricao);
    $categoria = $procedimento->categoria_nome;
    $duracao = $procedimento->duracaoMinutos;
    $profissionais = $procedimento->profissionais;
    $preco = number_format($procedimento->preco, 2, ',', '.');
    ?>
    <div class="col-12 col-md-6 col-lg-4 d-flex mb-4">
        <div class="card shadow-sm border-0 flex-fill">
            <img src="imgs/<?= $nome ?>.png" class="card-img-top" alt="Procedimento <?= $nome ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $nome ?></h5>
                <p class="card-text text-muted" style="min-height: 4.5rem;"><?= $descricao ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Categoria
                    <span class="badge bg-custom rounded-pill"><?= $categoria ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Duração
                    <span class="text-secondary"><?= $duracao ?> min</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Profissional
                    <span class="text-secondary"><?= $profissionais ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Preço
                    <strong>R$ <?= $preco ?></strong>
                </li>
            </ul>
            <div class="card-body">
                <a href="<?= $url ?>" target="_blank" rel="noopener" class="btn btn-custom w-100">Agendar agora</a>
            </div>
        </div>
    </div>
    <?php
}
?>