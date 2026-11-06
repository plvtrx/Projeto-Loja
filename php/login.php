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

    <title>E-commerce</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="right" id="loginForm">
                <form action="./validLoginC.php" method="POST">
                    <h1>Login <a class="btn-secreto" href="./loginCentral.php">.</a></h1>
                    <input class="style-input" type="email" name="email" placeholder="Email" required>
                    <input class="style-input" type="password" name="password" placeholder="Senha" required>
                    <input type="submit" id="submit" class="btn-entrar" name="submit" value="ENTRAR">

                    <a class="btn-criar" href="./register.php">CRIAR CONTA</a>

                    <input type="button" class="btn-voltar" value="Voltar" onclick="window.location.href='/index.php'">
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

    <script defer src="../JS/script.js"></script>
</body>

</html>