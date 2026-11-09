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
        $user_data = $result->fetch_assoc();
        $nome = $user_data['nome'];
        $email = $user_data['email'];
        $cpf = $user_data['cpf'];
        // Não exibir a senha
        $password = ""; // Deixe vazio, para que o usuário insira uma nova senha, se desejar
    } else {
        header("Location: /admClientes.php");
        exit();
    }
    $stmt->close();
} else {
    header("Location: /admClientes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/register.css">
    <link rel="shortcut icon" type="image/png" href="../favicon/selo Relicário-Vermelho.png">
    <script defer src="../JS/script.js"></script>
    <title>Relicário</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="left" id="registerForm" style="display: block;">
                <form action="./alterReg.php" method="POST">
                    <h1>Alterar Conta</h1>
                    <input class="style-input" type="text" name="nome" placeholder="Nome" required value="<?php echo htmlspecialchars($nome); ?>">
                    <input class="style-input" type="email" name="email" placeholder="Email" required value="<?php echo htmlspecialchars($email); ?>">
                    <input class="style-input" type="text" name="cpf" placeholder="CPF" required value="<?php echo htmlspecialchars($cpf); ?>">
                    <input class="style-input" type="password" name="senha" placeholder="Nova Senha (deixe em branco para manter a atual)"> <!-- Mudado para type="password" -->
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <input type="submit" id="update" class="btn-entrar" name="update" value="ALTERAR">
                    <div class="btn">
                        <a class="btn-criar" href="./admClientes.php">VOLTAR</a>
                    </div>
                </form>
            </div>
        </div>
        <ul class="boxes">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </main>
</body>

</html>
