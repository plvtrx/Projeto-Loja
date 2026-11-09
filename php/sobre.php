<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/sobre.css">
    <link rel="shortcut icon" type="image/png" href="./favicon/selo Relicário-Vermelho.png">
    <title>Sobre Nós | Relicário</title>
</head>

<body>

    <?php include __DIR__ . '/../INCLUDES/header.php'; ?>

    <main class="sobre-main">

        <!-- APRESENTAÇÃO -->
        <section class="sobre-hero">

            <div class="sobre-hero-content">

                <span class="sobre-subtitle">CONHEÇA A RELICÁRIO</span>

                <h1>
                    Mais que vestir,<br>
                    é expressar <span>quem você é.</span>
                </h1>

                <p>
                    Acreditamos que cada peça carrega uma identidade,
                    cada escolha conta uma história e cada detalhe
                    faz parte de quem somos.
                </p>

                <a href="/php/produtos.php" class="sobre-button">
                    CONHEÇA NOSSA COLEÇÃO
                </a>

            </div>

            <div class="sobre-hero-decoration">
                <img src="../IMG/selo Relicário-Vermelho.png" alt="Selo da Relicário">
            </div>

        </section>


        <!-- NOSSA HISTÓRIA -->
        <section class="sobre-historia">

            <div class="sobre-historia-title">

                <span class="sobre-subtitle">NOSSA HISTÓRIA</span>

                <h2>
                    Uma marca criada para valorizar
                    a sua <span>essência.</span>
                </h2>

            </div>

            <div class="sobre-historia-text">

                <p>
                    A Relicário nasceu com a proposta de oferecer
                    uma experiência de moda que vai além das tendências.
                    Acreditamos que vestir-se é uma forma de expressão,
                    personalidade e liberdade.
                </p>

                <p>
                    Cada escolha representa um pouco de quem somos.
                    Por isso, buscamos reunir peças que valorizem
                    diferentes estilos, permitindo que cada pessoa
                    encontre sua própria maneira de se expressar.
                </p>

                <p>
                    Nosso propósito é proporcionar uma experiência
                    de compra especial, unindo estilo, praticidade
                    e atenção aos detalhes.
                </p>

            </div>

        </section>


        <!-- NOSSA ESSÊNCIA -->
        <section class="sobre-essencia">

            <div class="sobre-essencia-header">

                <span class="sobre-subtitle">O QUE NOS DEFINE</span>

                <h2>Nossa essência</h2>

                <p>
                    Mais do que uma loja, queremos fazer parte
                    da sua maneira de enxergar e expressar o mundo.
                </p>

            </div>


            <div class="sobre-essencia-grid">

                <article class="sobre-item">

                    <span class="sobre-number">01</span>

                    <div class="sobre-icon">✦</div>

                    <h3>Autenticidade</h3>

                    <p>
                        Valorizamos a individualidade e acreditamos
                        que cada pessoa possui seu próprio estilo.
                    </p>

                </article>


                <article class="sobre-item">

                    <span class="sobre-number">02</span>

                    <div class="sobre-icon">◇</div>

                    <h3>Estilo</h3>

                    <p>
                        Buscamos oferecer opções que acompanhem
                        diferentes personalidades e ocasiões.
                    </p>

                </article>


                <article class="sobre-item">

                    <span class="sobre-number">03</span>

                    <div class="sobre-icon">♡</div>

                    <h3>Experiência</h3>

                    <p>
                        Queremos tornar cada etapa da sua compra
                        simples, agradável e especial.
                    </p>

                </article>

            </div>

        </section>


        <!-- MENSAGEM FINAL -->
        <section class="sobre-final">

            <span class="sobre-subtitle">RELICÁRIO</span>

            <h2>
                Seu estilo conta uma história.<br>
                <span>Vista a sua.</span>
            </h2>

            <p>
                Descubra peças que combinam com você.
            </p>

            <a href="/php/produtos.php" class="sobre-button sobre-button-light">
                EXPLORAR PRODUTOS
            </a>

        </section>

    </main>

    <?php include __DIR__ . '/../INCLUDES/footer.php'; ?>

</body>

</html>