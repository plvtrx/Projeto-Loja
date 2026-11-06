<?php
session_start();
include_once(__DIR__ . "/config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $password = $_POST['senha']; // Este é o campo de senha

    // Iniciar a query de atualização
    $sqlUpdate = "UPDATE clientes SET nome = ?, email = ?, CPF = ?";

    // Verificar se a senha foi fornecida
    if (!empty($password)) {
        // Se a senha não estiver vazia, criptografe-a
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sqlUpdate .= ", senha = ?"; // Adicione a parte da senha à query
    }

    $sqlUpdate .= " WHERE idCliente = ?"; // Finalize a query

    // Preparar a consulta
    $stmt = $conexao->prepare($sqlUpdate);

    // Bind dos parâmetros
    if (!empty($password)) {
        // Se a senha foi fornecida, vincule todos os parâmetros
        $stmt->bind_param("ssssi", $nome, $email, $cpf, $passwordHash, $id);
    } else {
        // Se a senha não foi fornecida, não inclua a senha na atualização
        $stmt->bind_param("sssi", $nome, $email, $cpf, $id);
    }

    // Execute a consulta
    $stmt->execute();
    $stmt->close();

    // Redirecionar ou exibir uma mensagem de sucesso
    header("Location: ./admClientes.php");
    exit();
}
?>
