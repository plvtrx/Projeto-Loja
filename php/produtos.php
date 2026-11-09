
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/produtos.css">
    <link rel="shortcut icon" type="image/png" href="../favicon/selo Relicário-Vermelho.png">
    <title>Produtos | Relicário</title>
</head>

<body>

    <header>
        <?php include "../INCLUDES/header.php"; ?>
    </header>

    <main>

        <section class="products-section">

            <div class="products-header">

                <div>
                    <span class="section-subtitle">
                        NOSSA COLEÇÃO
                    </span>

                    <h1>Produtos</h1>
                </div>

                <p class="products-count" id="productsCount">
                    Carregando produtos...
                </p>

            </div>

            <!-- GRID DE PRODUTOS -->

            <div class="products-grid" id="productsGrid">
            </div>

            <!-- CARREGAMENTO -->

            <div class="loading" id="loading" hidden>

                <img
                    src="../IMG/loading.png"
                    alt="Carregando produtos"
                    class="loading-image">

                <p>Carregando produtos...</p>

            </div>

            <!-- ERRO -->

            <div class="error-message" id="errorMessage" hidden>

                Não foi possível carregar os produtos.

                <button id="retryBtn" type="button">
                    Tentar novamente
                </button>

            </div>

            <!-- NENHUM PRODUTO -->

            <div class="empty-message" id="emptyMessage" hidden>

                <h3>Nenhum produto encontrado.</h3>

                <p>Não existem produtos cadastrados no momento.</p>

            </div>

            <!-- VER MAIS -->

            <div class="load-more-container">

                <button id="loadMoreBtn" type="button" hidden>
                    VER MAIS PRODUTOS
                </button>

            </div>

        </section>

    </main>

    <footer>
        <?php include "../INCLUDES/footer.php"; ?>
    </footer>

    <script src="../JS/produtos.js"></script>

</body>
</html>
