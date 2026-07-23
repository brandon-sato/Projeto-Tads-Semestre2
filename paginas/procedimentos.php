<?php
    require 'select.php';
?>
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Procedimentos</h1>
        <p class="lead text-muted">Descubra tratamentos pensados para seu bem-estar e relaxamento.</p>
    </div>

    <?php if ($erroConexao !== null): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro de Conexão!</strong> <?= htmlspecialchars($erroConexao) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    <?php else: ?>
        <div class="row justify-content-center g-4">
            <?php if (!empty($procedimentos)): ?>
                <?php foreach ($procedimentos as $procedimento): ?>
                    <?php exibirCardProcedimento($procedimento); ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p>Não há procedimentos cadastrados no momento.</p>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
