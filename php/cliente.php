<?php
session_start();
if (isset($_SESSION['email'])) {
    include_once(__DIR__ . '/config.php');
    $email = $_SESSION['email'];
} else {
    header("Location: /index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="/CSS/cliente.css">
    <title>E-commerce</title>
</head>

<body>
    <header class="perfil">
        <h2>Bem-Vindo! <?php echo "$email"; ?></h2>
        <?php
        if (isset($email)) {
            echo
            "<div> 
                    <button class='btn-voltar'><a href='/index.php'>INICIO</a></button>
                    <button class='btn-sair'><a href='./signIn.php'>SAIR</a></button>
                </div>
                ";
        }
        ?>
    </header>
    <main>

        <div class="container">
            <section class="acao">
                <h3>Minhas Atividades</h3>
                <ul>
                    <li>Minhas Compras</li>
                    <li>Favoritos</li>
                    <li>Acessibilidade</li>
                </ul>
            </section>

            <section class="acao">
                <h3>Suporte</h3>
                <ul>
                    <li>central de ajuda</li>
                    <li>Acessibilidade</li>
                </ul>
            </section>
        </div>
    </main>
</body>

</html>