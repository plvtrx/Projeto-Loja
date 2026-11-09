const productsGrid = document.getElementById("productsGrid");
const loadMoreBtn = document.getElementById("loadMoreBtn");
const loading = document.getElementById("loading");
const errorMessage = document.getElementById("errorMessage");
const emptyMessage = document.getElementById("emptyMessage");
const productsCount = document.getElementById("productsCount");
const retryBtn = document.getElementById("retryBtn");

// =============================================
// CONFIGURAÇÕES
// =============================================

const API_URL = "../API/produtos.php";
const LIMIT = 10;

let offset = 0;
let carregando = false;
let temMais = true;

// =============================================
// CAMINHO DAS IMAGENS
// =============================================

const IMAGE_PATH = "../IMG/produtos/";
const IMAGE_DEFAULT = "../IMG/loading.png";

// =============================================
// FORMATAÇÃO DO PREÇO
// =============================================

function formatarPreco(valor) {

    return Number(valor).toLocaleString("pt-BR", {
        style: "currency",
        currency: "BRL"
    });

}

// =============================================
// CRIAÇÃO DO CARD
// =============================================

function criarCard(produto) {

    const card = document.createElement("article");
    card.className = "product-card";

    // IMAGEM

    const imageContainer = document.createElement("div");
    imageContainer.className = "product-image";

    const image = document.createElement("img");

    // BUSCAR IMAGEM NA PASTA IMG/PRODUTOS

    if (produto.imagem && produto.imagem.trim() !== "") {

        image.src = IMAGE_PATH + encodeURIComponent(produto.imagem);

    } else {

        image.src = IMAGE_DEFAULT;

    }

    image.alt = produto.nome || "Produto";
    image.loading = "lazy";

    // CASO A IMAGEM NÃO SEJA ENCONTRADA

    image.onerror = function () {

        console.error("Imagem não encontrada:", this.src);

        this.onerror = null;
        this.src = IMAGE_DEFAULT;

    };

    imageContainer.appendChild(image);

    // INFORMAÇÕES

    const info = document.createElement("div");
    info.className = "product-info";

    // NOME

    const name = document.createElement("h3");
    name.textContent = produto.nome || "Produto sem nome";

    // DESCRIÇÃO

    const description = document.createElement("p");
    description.className = "product-description";
    description.textContent = produto.descricao || "";

    // PREÇO

    const price = document.createElement("span");
    price.className = "product-price";
    price.textContent = formatarPreco(produto.preco);

    // ESTOQUE

    const estoque = document.createElement("span");

    if (Number(produto.quantidade) > 0) {

        estoque.textContent = "Disponível";
        estoque.className = "product-stock disponivel";

    } else {

        estoque.textContent = "Esgotado";
        estoque.className = "product-stock esgotado";

    }

    // MONTAGEM DO CARD

    info.appendChild(name);
    info.appendChild(description);
    info.appendChild(price);
    info.appendChild(estoque);

    card.appendChild(imageContainer);
    card.appendChild(info);

    return card;

}

// =============================================
// CARREGAR PRODUTOS
// =============================================

async function carregarProdutos() {

    if (carregando || !temMais) {
        return;
    }

    carregando = true;

    loading.hidden = false;
    loadMoreBtn.hidden = true;
    loadMoreBtn.disabled = true;
    errorMessage.hidden = true;
    emptyMessage.hidden = true;

    try {

        const params = new URLSearchParams({
            offset: offset
        });

        // REQUISIÇÃO ASSÍNCRONA

        const response = await fetch(
            `${API_URL}?${params.toString()}`
        );

        if (!response.ok) {

            throw new Error("Erro ao carregar produtos.");

        }

        const data = await response.json();

        if (!data.success) {

            throw new Error(data.message || "Erro ao carregar produtos.");

        }

        // VERIFICAR PRODUTOS RECEBIDOS

        console.log("Produtos recebidos:", data.produtos);

        // VERIFICA SE EXISTEM PRODUTOS

        if (data.produtos.length === 0 && offset === 0) {

            emptyMessage.hidden = false;
            productsCount.textContent = "0 produtos";

            temMais = false;

            return;

        }

        // ADICIONA OS CARDS NA TELA

        data.produtos.forEach(produto => {

            const card = criarCard(produto);

            productsGrid.appendChild(card);

        });

        // ATUALIZA PAGINAÇÃO

        offset += data.produtos.length;

        temMais = data.temMais;

        // ATUALIZA QUANTIDADE EXIBIDA

        productsCount.textContent =
            `${offset} produtos exibidos`;

        // CONTROLA BOTÃO VER MAIS

        loadMoreBtn.hidden = !temMais;

    } catch (error) {

        console.error("Erro ao carregar produtos:", error);

        errorMessage.hidden = false;

    } finally {

        carregando = false;

        loading.hidden = true;

        loadMoreBtn.disabled = false;

    }

}

// =============================================
// BOTÃO VER MAIS
// =============================================

loadMoreBtn.addEventListener("click", () => {

    carregarProdutos();

});

// =============================================
// TENTAR NOVAMENTE
// =============================================

retryBtn.addEventListener("click", () => {

    carregarProdutos();

});

// =============================================
// CARREGAMENTO INICIAL
// =============================================

carregarProdutos();