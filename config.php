<?php
    //conectar no banco de dados
    $host = "localhost";
    $user = "usuario";
    $pass = "wanrltw";
    $dbname = "lotusspa";
    $erroConexao = null;
    $pdo = null;

    try {
        //conexao com o banco
        $pdo = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    } catch (PDOException $e) {
        //armazenar erro sem quebrar o site
        $erroConexao = "Não foi possível conectar ao banco de dados. O servidor está indisponível.";
    }
?>