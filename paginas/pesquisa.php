<?php
require 'select.php';

$pesquisa = trim($_GET['pesquisa'] ?? '');
$procedimentosFiltrados = buscarProcedimentos($procedimentos ?? [], $pesquisa);
?>
<div class="container py-5">
    <div class="row align-items-center mb-4">
        <div class="col-lg-8">
            <h1 class="display-5 fw-bold">Pesquisa de Procedimentos</h1>
        </div>
    </div>
    
    <?php if ($erroConexao !== null): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro de Conexão!</strong> <?= htmlspecialchars($erroConexao) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    <?php else: ?>
        <?php if ($pesquisa !== ''): ?>
            <div class="alert alert-secondary">Resultados para "<strong><?= $pesquisa ?></strong>"</div>
        <?php endif; ?>
        <div class="row justify-content-center g-4">
            <?php if (!empty($procedimentosFiltrados)): ?>
                <?php foreach ($procedimentosFiltrados as $procedimento): ?>
                    <?php exibirCardProcedimento($procedimento); ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        Não foram encontrados procedimentos para "<strong><?= $pesquisa ?></strong>".
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
