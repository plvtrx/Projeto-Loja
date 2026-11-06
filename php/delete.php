<?php
session_start();

if (!empty($_GET['id'])) {
    include_once(__DIR__ . '/config.php');

    $id = $_GET['id'];

    // Usando consulta preparada para evitar injeção SQL
    $sqlSelect = "SELECT * FROM clientes WHERE idCliente = ?";
    $stmt = $conexao->prepare($sqlSelect);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Preparar a consulta de exclusão
        $sqlDelet = "DELETE FROM clientes WHERE idCliente = ?";
        $stmtDelete = $conexao->prepare($sqlDelet);
        $stmtDelete->bind_param("i", $id); // Vincular o parâmetro id
        $stmtDelete->execute(); // Executar a consulta de exclusão

        // Verificar se a exclusão foi bem-sucedida
        if ($stmtDelete->affected_rows > 0) {
            $_SESSION['success_message'] = "Usuário excluído com sucesso.";
        } else {
            $_SESSION['error_message'] = "Erro ao excluir o usuário.";
        }

        $stmtDelete->close(); // Fechar a consulta de exclusão
    } else {
        $_SESSION['error_message'] = "Usuário não encontrado.";
    }
    $stmt->close();
} else {
    $_SESSION['error_message'] = "ID inválido.";
}

// Redirecionar para a página de administração de clientes
header("Location: ./admClientes.php");
exit();
?>
