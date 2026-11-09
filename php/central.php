<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['email'])) {
    header('Location: ./loginCentral.php');
    exit;
}

// Nome do usuário
$logado = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="/CSS/gestao.css">

    <script defer src="/JS/gestao.js"></script>

    <title>Painel de Gestão | E-commerce</title>
</head>

<body>

    <main>

        <div class="container">

            <div class="titulo">
                <span>Painel administrativo</span>

                <h1>Bem-vindo, <?php echo $logado; ?></h1>

                <h2>ao</h2>

                <h3>Painel de Gestão</h3>

                <p>Gerencie sua loja de forma simples e organizada.</p>
            </div>

            <div class="gestao">

                <div class="section">

                    <div class="icone">♧</div>

                    <h2>Produtos</h2>

                    <p>
                        Gerencie os produtos da sua loja,
                        cadastros e informações.
                    </p>

                    <a href="../php/admProdutos.php">
                        <button>Gerenciar Produtos</button>
                    </a>

                </div>

                <div class="section">

                    <div class="icone">♙</div>

                    <h2>Clientes</h2>

                    <p>
                        Visualize e gerencie os clientes
                        cadastrados em sua plataforma.
                    </p>
                    <a href="../php/admClientes.php">
                        <button>
                            Gerenciar Clientes
                        </button>
                    </a>

                </div>

            </div>

            <div class="sair">
                <a href="./sair.php">SAIR</a>
            </div>

        </div>

    </main>

</body>

</html>