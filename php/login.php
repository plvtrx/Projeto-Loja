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

                <!-- CRIAR CONTA -->
                <div class="primeiro-acesso">
                    <h2>Primeiro acesso<a href="../php/loginCentral.php" class="oculto">?</a></h2>
                    <p>Crie sua conta para continuar</p>

                    <a class="btn-criar" href="../php/register.php">
                        Criar conta
                    </a>
                </div>

                <!-- LOGIN -->
                <form action="../php/validLoginC.php" method="POST">

                    <h2>Já tem cadastro?</h2>

                    <p class="descricao">
                        Entre com seu e-mail e senha para continuar
                    </p>

                    <input
                        class="style-input"
                        type="text"
                        name="email"
                        placeholder="E-mail"
                        required>

                    <div class="campo-senha">

                        <input
                            class="style-input"
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Senha"
                            required>

                        <span class="mostrar-senha" onclick="togglePassword()">
                            ◉
                        </span>

                    </div>

                    <a href="#" class="esqueci-senha">
                        Esqueci minha senha
                    </a>

                    <input type="submit" id="submit" class="btn-entrar" name="submit" value="ENTRAR">

                    <input type="button" class="btn-entrar" name="voltar" value="Voltar" onclick="window.location.href='/index.php'">

                </form>

            </div>
        </div>
    </main>
    <script defer src="../JS/script.js"></script>
</body>

</html>