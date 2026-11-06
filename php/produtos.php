<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/produtos.css">
    <title>E-commerce</title>
</head>

<body>
    <header>
        <nav>
            <ul class="nav-links">
                <li><a href="/index.php">Home</a></li>
                <li><a href="/php/produtos.php">Produtos</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>

        <div class="logoMarca"><img src="../SVG/alphabet-uppercase.svg" alt="Logo"></div>

        <nav>
            <ul class="nav-icons">
                <li class="search-bar">
                    <div class="icon-search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </div>
                    <input type="text" class="search-input" placeholder="Camisa...">
                </li>
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="../php/login.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main>

        <section>
            <div class="categoria"></div> <!-- colocar botão para selecionar qual tipo de peça -->
            <div class="tamanho"></div> <!-- colocar botão para selecionar qual tamanho -->
            <div class="cor"></div> <!-- colocar botão para selecionar qual cor-->
            <div class="relevancia"></div> <!-- colocar botão para selecionar ordem que sera mostrado -->
        </section>

        <section class="section-produto">
            <p class="qtdProduto">4 produtos</p>

            <section class="card-produtos">
                <div class="card">
                    <img src="../IMG/roupa1.jpg" alt="Produto 1">
                    <p class="descricao">Descrição produto</p>
                    <p>R$12,99</p>
                </div>

                <div class="card">
                    <img src="../IMG/roupa2.jpg" alt="Produto 2">
                    <p class="descricao">Descrição produto</p>
                    <p>R$12,99</p>
                </div>

                <div class="card">
                    <img src="../IMG/roupa3.jpg" alt="Produto 3">
                    <p class="descricao">Descrição produto</p>
                    <p>R$12,99</p>
                </div>

                <div class="card">
                    <img src="../IMG/roupa4.jpg" alt="Produto 4">
                    <p class="descricao">Descrição produto</p>
                    <p>R$12,99</p>
                </div>
            </section>
        </section>
    </main>

    <footer>
        <span id="contato"></span>
        <p>© Paulo Vitor dos Santos Nascimento 2026 E-commerce. Todos os direitos reservados.</p>
    </footer>
</body>

</html>