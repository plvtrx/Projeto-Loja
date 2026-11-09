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
    <link rel="shortcut icon" type="image/png" href="../favicon/selo Relicário-Vermelho.png">
    <title>Relicário</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="right" id="loginForm">
                <form action="../php/validLogin.php" method="POST">
                    <h1>Login</h1>

                    <input class="style-input" type="email" name="email" id="email" placeholder="Email" required>
                    <input class="style-input" type="password" name="password" id="password" placeholder="Senha" required>
                    <input type="submit" id="submit" class="btn-entrar" name="submit" value="ENTRAR">
                    <input type="button" class="btn-entrar" name="voltar" value="Voltar" onclick="window.location.href='./login.php'">
                </form>
            </div>
        </div>

    </main>

    <script defer src="../JS/script.js"></script>
</body>

</html>