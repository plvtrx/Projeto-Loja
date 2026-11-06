<?php
session_start();
// Exibir mensagem de erro se existir e se o formulário foi enviado
if (isset($_SESSION['error_message'])) {
    echo "<div id='error-message' class='error-message'>" . $_SESSION['error_message'] . "</div>";
    // Limpar a mensagem após exibi-la
    unset($_SESSION['error_message']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/login.css">
    <script defer src="../JS/script.js"></script>
    <title>E-commerce</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="left" id="registerForm" style="display: block;">
                <form action="./valdReg.php" method="POST">
                    <h1>Criar Conta</h1>
                    <input class="style-input" type="text" name="nome" placeholder="Nome Completo" required>
                    <input class="style-input" type="email" name="email" placeholder="Email" required>
                    <input class="style-input" type="text" name="CPF" placeholder="CPF" required>
                    <input class="style-input" type="password" name="password" placeholder="Senha" required>
                    <input class="style-input" type="password" name="passwordConf" placeholder="Confirme a Senha"
                        required>
                    <input type="submit" id="submit" class="btn-entrar" name="submit" value="CRIAR CONTA">
                    <div class="btn">
                        <a class="btn-criar" href="./login.php">VOLTA AO LOGIN</a>
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