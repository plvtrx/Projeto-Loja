<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: /index.php");
    exit();
}

include_once(__DIR__ . '/config.php');

$email = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="/CSS/cliente.css">

    <title>Minha Conta | Relicário</title>
</head>

<body>

    <?php include __DIR__ . '/../INCLUDES/header.php'; ?>

    <main class="cliente-main">

        <!-- BOAS-VINDAS -->
        <section class="cliente-welcome">

            <span class="cliente-subtitle">MINHA CONTA</span>

            <h1>Olá, seja bem-vindo!</h1>

            <p>
                Aqui você pode acompanhar seus pedidos,
                gerenciar suas informações e aproveitar
                sua experiência na nossa loja.
            </p>

        </section>


        <!-- FUNCIONALIDADES -->
        <section class="cliente-options">

            <div class="cliente-section-header">

                <div>
                    <span class="cliente-subtitle">ÁREA DO CLIENTE</span>
                    <h2>Minha conta</h2>
                </div>

            </div>


            <div class="cliente-grid">

                <!-- MINHAS COMPRAS -->
                <a href="meusPedidos.php" class="cliente-card">

                    <div class="cliente-card-icon">
                        📦
                    </div>

                    <div class="cliente-card-info">
                        <h3>Minhas compras</h3>
                        <p>Acompanhe suas compras e entregas.</p>
                    </div>

                    <span class="cliente-arrow">→</span>

                </a>


                <!-- DADOS PESSOAIS -->
                <a href="dadosPessoais.php" class="cliente-card">

                    <div class="cliente-card-icon">
                        👤
                    </div>

                    <div class="cliente-card-info">
                        <h3>Dados pessoais</h3>
                        <p>Consulte e atualize seus dados.</p>
                    </div>

                    <span class="cliente-arrow">→</span>

                </a>


                <!-- ENDEREÇOS -->
                <a href="meusEnderecos.php" class="cliente-card">

                    <div class="cliente-card-icon">
                        📍
                    </div>

                    <div class="cliente-card-info">
                        <h3>Meus endereços</h3>
                        <p>Gerencie seus endereços de entrega.</p>
                    </div>

                    <span class="cliente-arrow">→</span>

                </a>


                <!-- FAVORITOS -->
                <a href="favoritos.php" class="cliente-card">

                    <div class="cliente-card-icon">
                        ❤️
                    </div>

                    <div class="cliente-card-info">
                        <h3>Favoritos</h3>
                        <p>Veja os produtos que você salvou.</p>
                    </div>

                    <span class="cliente-arrow">→</span>

                </a>


                <!-- SEGURANÇA -->
                <a href="seguranca.php" class="cliente-card">

                    <div class="cliente-card-icon">
                        🔒
                    </div>

                    <div class="cliente-card-info">
                        <h3>Segurança</h3>
                        <p>Altere sua senha e proteja sua conta.</p>
                    </div>

                    <span class="cliente-arrow">→</span>

                </a>


                <!-- ATENDIMENTO -->
                <a href="atendimento.php" class="cliente-card">

                    <div class="cliente-card-icon">
                        💬
                    </div>

                    <div class="cliente-card-info">
                        <h3>Central de ajuda</h3>
                        <p>Entre em contato conosco.</p>
                    </div>

                    <span class="cliente-arrow">→</span>

                </a>

            </div>

        </section>


        <!-- ÚLTIMOS PEDIDOS -->
        <section class="cliente-orders">

            <div class="cliente-section-header">

                <div>
                    <span class="cliente-subtitle">SUAS COMPRAS</span>
                    <h2>Últimos pedidos</h2>
                </div>

                <a href="meusPedidos.php" class="cliente-view-all">
                    Ver todos →
                </a>

            </div>


            <div class="cliente-order-empty">

                <div class="cliente-empty-icon">
                    🛍️
                </div>

                <h3>Suas compras aparecerão aqui</h3>

                <p>
                    Assim que você realizar seu primeiro pedido,
                    poderá acompanhar o andamento da sua compra
                    nesta seção.
                </p>

                <a href="/php/produtos.php" class="cliente-shop-button">
                    EXPLORAR PRODUTOS
                </a>

            </div>

        </section>


        <!-- SAIR DA CONTA -->
        <section class="cliente-logout">

            <a href="/php/signIn.php">
                ↪ Sair da minha conta
            </a>

        </section>

    </main>

    <?php include __DIR__ . '/../INCLUDES/footer.php'; ?>

</body>
</html>