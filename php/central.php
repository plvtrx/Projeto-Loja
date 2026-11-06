<?php
session_start();

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)) {
    header('Location: ./loginCentral.php');
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    echo "<div id='error-message' class='error-message'>" . $_SESSION['error_message'] . "</div>";
    // Limpar a mensagem após exibi-la
    unset($_SESSION['error_message']);
}
    $logado = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="/CSS/gestao.css">
    <script defer src="/JS/gestao.js"></script>
    <title>E-commerce</title>
</head>

<body>
    <main>
        <div class="container">
            <h1>Bem-vindo <?php echo $logado ?></h1>
            <h2>ao</h2>
            <h3>Painel de Gestão</h3>
            <div class="gestao">
                <div class="section">
                    <h2>Produtos</h2>
                    <a href="./admClientes.php"><button>Gerenciar Produtos</button></a>
                </div>
                <div class="section">
                    <h2>Clientes</h2>
                    <button onclick="manageClients()">Gerenciar Clientes</button>
                </div>
            </div>

            <div class="sair">
                <a href="./sair.php">SAIR</a>
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