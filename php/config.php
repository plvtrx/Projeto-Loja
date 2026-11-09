<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'LojaABC';

$conexao = new mysqli(
    $dbHost,
    $dbUsername,
    $dbPassword,
    $dbName
);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");

?>
