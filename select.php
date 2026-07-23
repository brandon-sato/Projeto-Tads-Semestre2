<?php
require 'config.php';

$procedimentos = [];

if ($pdo !== null) {
    try {
        $sql = "SELECT 
                procedimento.id AS procedimento_id,
                procedimento.nome AS procedimento_nome,
                procedimento.duracaoMinutos,
                procedimento.preco,
                procedimento.descricao,
                categoria.nome AS categoria_nome,
                GROUP_CONCAT(profissional.nome ORDER BY profissional.nome SEPARATOR ', ') AS profissionais,
                profissional.contato
            FROM procedimento_profissional
            INNER JOIN procedimento ON procedimento_profissional.id_procedimento = procedimento.id
            INNER JOIN profissional ON procedimento_profissional.id_profissional = profissional.id
            INNER JOIN categoria ON procedimento.id_categoria = categoria.id
            GROUP BY procedimento.id  
            ORDER BY procedimento_nome ASC";
            
        $stmt = $pdo->query($sql);
        $procedimentos = $stmt->fetchAll(PDO::FETCH_OBJ);

    } catch (\PDOException $e) {
        $erroConexao = "Erro na consulta: " . $e->getMessage();
    }
}
?>