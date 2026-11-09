<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/home.css">
    <link rel="shortcut icon" type="image/png" href="./favicon/selo Relicário-Vermelho.png">
    <title>Relicário</title>
</head>

<body>
    <header>
        <?php include "./INCLUDES/header.php" ?>
    </header>


    <main>
        <div class="carrossel">
            <div class="carrossel-container">
                <div class="carrossel-item active">
                    <img src="./IMG/primeira.jpg" alt="Produto 1">
                </div>
                <div class="carrossel-item">
                    <img src="./IMG/segunda.jpg" alt="Produto 2">
                </div>
                <div class="carrossel-item">
                    <img src="./IMG/terceira.jpg" alt="Produto 3">
                </div>
            </div>
            <button class="carrossel-prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="carrossel-next" onclick="moveSlide(1)">&#10095;</button>

            <div class="sinalizacao">
                <span class="bolinha active"></span>
                <span class="bolinha"></span>
                <span class="bolinha"></span>
            </div>
        </div>



        <section class="products-section">

            <div class="products-header">
                <div>
                    <span class="section-subtitle">NOVA COLEÇÃO</span>
                </div>

                <a href="./php/produtos.php" class="view-all">Ver tudo →</a>
            </div>

            <div class="products-grid">

                <!-- PRODUTO 1 -->
                <div class="product-card">

                    <div class="product-image">
                        <img src="/IMG/roupa1.jpg" alt="Blazer Minimal">
                    </div>

                    <div class="product-info">
                        <h3>Blazer Minimal</h3>

                        <div class="product-description">
                            <p>Blazer em alfaiataria</p>

                            <button class="favorite-btn"
                                aria-label="Favoritar Blazer Minimal"
                                aria-pressed="false">
                                <i class="fa-regular fa-heart">♡</i>
                            </button>
                        </div>

                        <span class="product-price">R$ 289,90</span>
                    </div>

                </div>


                <!-- PRODUTO 2 -->
                <div class="product-card">

                    <div class="product-image">
                        <img src="/IMG/roupa2.jpg" alt="Camisa Essential">
                    </div>

                    <div class="product-info">
                        <h3>Camisa Essential</h3>

                        <div class="product-description">
                            <p>Camisa em algodão</p>

                            <button class="favorite-btn"
                                aria-label="Favoritar Camisa Essential"
                                aria-pressed="false">
                                <i class="fa-regular fa-heart">♡</i>
                            </button>
                        </div>

                        <span class="product-price">R$ 159,90</span>
                    </div>

                </div>


                <!-- PRODUTO 3 -->
                <div class="product-card">

                    <div class="product-image">
                        <img src="/IMG/roupa3.jpg" alt="Calça Classic">
                    </div>

                    <div class="product-info">
                        <h3>Calça Classic</h3>

                        <div class="product-description">
                            <p>Calça de alfaiataria</p>

                            <button class="favorite-btn"
                                aria-label="Favoritar Calça Classic"
                                aria-pressed="false">
                                <i class="fa-regular fa-heart">♡</i>
                            </button>
                        </div>

                        <span class="product-price">R$ 219,90</span>
                    </div>

                </div>


                <!-- PRODUTO 4 -->
                <div class="product-card">

                    <div class="product-image">
                        <img src="/IMG/roupa4.jpg" alt="Bolsa Urban">
                    </div>

                    <div class="product-info">
                        <h3>Bolsa Urban</h3>

                        <div class="product-description">
                            <p>Bolsa em couro sintético</p>

                            <button class="favorite-btn"
                                aria-label="Favoritar Bolsa Urban"
                                aria-pressed="false">
                                <i class="fa-regular fa-heart">♡</i>
                            </button>
                        </div>

                        <span class="product-price">R$ 199,90</span>
                    </div>

                </div>

            </div>

        </section>


        <section class="categories-section">

            <div class="categories-header">
                <span class="section-subtitle">EXPLORE NOSSA LOJA</span>
                <h2>Compre por categoria</h2>
                <p>Encontre peças que combinam com seu estilo.</p>
            </div>

            <div class="categories-grid">

                <!-- CATEGORIA 1: CAMISAS -->
                <a href="#" class="category-card">

                    <img src="/IMG/camisa.jpg" alt="Camisas">

                    <div class="category-overlay">
                        <h3>Camisas</h3>
                        <span>EXPLORAR COLEÇÃO →</span>
                    </div>

                </a>


                <!-- CATEGORIA 2: CALÇAS -->
                <a href="#" class="category-card">

                    <img src="/IMG/calça.jpg" alt="Calças">

                    <div class="category-overlay">
                        <h3>Calças</h3>
                        <span>EXPLORAR COLEÇÃO →</span>
                    </div>

                </a>


                <!-- CATEGORIA 3: VESTIDOS -->
                <a href="#" class="category-card">

                    <img src="/IMG/vestido.jpg" alt="Vestidos">

                    <div class="category-overlay">
                        <h3>Vestidos</h3>
                        <span>EXPLORAR COLEÇÃO →</span>
                    </div>

                </a>

            </div>

        </section>


        <script src="./JS/carrossel.js"></script>
    </main>

    <footer>
        <?php include "./INCLUDES/footer.php" ?>
    </footer>
</body>

</html>