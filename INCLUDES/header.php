<header>
    <nav class="primeira">
        <ul>
            <li class="menu-hamburguer">
                <div class="icon-hamburguer" onclick="toggleMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 12h12v1H2v-1zm0-5h12v1H2V7zm0-5h12v1H2V2z" />
                    </svg>
                </div>
            </li>
            <li class="search-bar">
                <div class="icon-search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </div>
            </li>
        </ul>

        <div class="logoMarca">
            <img src="../IMG/Logo Relicário-bege.png" alt="Logo">
        </div>

        <ul class="nav-icons">
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
                <a href="<?php
                            if (isset($_SESSION['email'])) {

                                if ($_SESSION['email'] === 'admin@gmail.com') {
                                    echo '../php/central.php';
                                } else {
                                    echo '../php/cliente.php';
                                }
                            } else {
                                echo '../php/login.php';
                            }
                            ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                    </a>
            </li>
        </ul>
    </nav>

    <nav class="segunda">
        <ul class="nav-links" id="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../php/produtos.php">Produtos</a></li>
            <li><a href="../php/sobre.php">Sobre nós</a></li>
        </ul>
    </nav>

    <!-- Menu Hamburguer -->
    <div class="hamburger-menu" id="hamburger-menu">
        <div class="close-btn" onclick="toggleMenu()">&times;</div>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../php/produtos.php">Produtos</a></li>
            <li><a href="#contato">Sobre nós</a></li>
        </ul>
    </div>
    <script src="../JS/menu.js"></script>
</header>