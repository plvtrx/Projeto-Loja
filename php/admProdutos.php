
<?php

session_start();

include_once __DIR__ . "/config.php";

// =============================================
// VERIFICAR SE O USUÁRIO ESTÁ LOGADO
// =============================================

if (!isset($_SESSION['email'])) {

    header("Location: ./loginCentral.php");
    exit();

}

// =============================================
// TOKEN CSRF
// =============================================

if (empty($_SESSION['csrf_token'])) {

    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

}

// =============================================
// CAMINHO DAS IMAGENS
// =============================================

$caminhoImagens = "../IMG/produtos/";

// =============================================
// INCLUIR CRUD
// =============================================

require_once __DIR__ . "/crudProdutos.php";

// =============================================
// LISTAR PRODUTOS
// =============================================

$sql = "SELECT * FROM produto ORDER BY idProduto DESC";

$result = $conexao->query($sql);

if (!$result) {
    die("Erro ao consultar os produtos.");
}

// =============================================
// MENSAGENS
// =============================================

$mensagemTela = $_SESSION['mensagem'] ?? '';

unset($_SESSION['mensagem']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gerenciar Produtos</title>

    <!-- CSS -->

    <link rel="stylesheet" href="../CSS/admProdutos.css">

</head>

<body>

<main>

    <!-- ===================================== -->
    <!-- CABEÇALHO -->
    <!-- ===================================== -->

    <header class="cabecalho">

        <div>

            <span class="subtitulo">
                PAINEL ADMINISTRATIVO
            </span>

            <h1>Gerenciar Produtos</h1>

            <p>
                Cadastre, edite e organize os produtos da sua loja.
            </p>

        </div>

        <a href="./central.php" class="btn-voltar">
            ← VOLTAR AO PAINEL
        </a>

    </header>


    <!-- ===================================== -->
    <!-- MENSAGEM -->
    <!-- ===================================== -->

    <?php if ($mensagemTela): ?>

        <div class="mensagem">
            <?php echo e($mensagemTela); ?>
        </div>

    <?php endif; ?>


    <!-- ===================================== -->
    <!-- FORMULÁRIO DE PRODUTOS -->
    <!-- ===================================== -->

    <section class="cadastro">

        <div class="titulo">

            <?php if ($produtoEdicao): ?>

                <h2>Editar produto</h2>

                <p>
                    Altere as informações do produto selecionado.
                </p>

            <?php else: ?>

                <h2>Cadastrar novo produto</h2>

                <p>
                    Preencha as informações para adicionar um produto.
                </p>

            <?php endif; ?>

        </div>


        <form method="POST" enctype="multipart/form-data">

            <!-- TOKEN CSRF -->

            <input
                type="hidden"
                name="csrf_token"
                value="<?php echo e($_SESSION['csrf_token']); ?>"
            >


            <!-- AÇÃO DO FORMULÁRIO -->

            <?php if ($produtoEdicao): ?>

                <input
                    type="hidden"
                    name="acao"
                    value="atualizar"
                >

                <input
                    type="hidden"
                    name="idProduto"
                    value="<?php echo (int)$produtoEdicao['idProduto']; ?>"
                >

            <?php else: ?>

                <input
                    type="hidden"
                    name="acao"
                    value="cadastrar"
                >

            <?php endif; ?>


            <div class="form-grid">


                <!-- ================================= -->
                <!-- NOME -->
                <!-- ================================= -->

                <div class="campo">

                    <label for="nome">
                        Nome do produto
                    </label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        maxlength="100"
                        placeholder="Ex: Camiseta básica"
                        value="<?php echo e($produtoEdicao['nome'] ?? ''); ?>"
                        required
                    >

                </div>


                <!-- ================================= -->
                <!-- PREÇO -->
                <!-- ================================= -->

                <div class="campo">

                    <label for="preco">
                        Preço (R$)
                    </label>

                    <input
                        type="number"
                        id="preco"
                        name="preco"
                        min="0"
                        max="99999999.99"
                        step="0.01"
                        placeholder="0.00"
                        value="<?php echo e($produtoEdicao['preco'] ?? ''); ?>"
                        required
                    >

                </div>


                <!-- ================================= -->
                <!-- QUANTIDADE -->
                <!-- ================================= -->

                <div class="campo">

                    <label for="quantidade">
                        Quantidade em estoque
                    </label>

                    <input
                        type="number"
                        id="quantidade"
                        name="quantidade"
                        min="0"
                        step="1"
                        placeholder="Ex: 20"
                        value="<?php echo e($produtoEdicao['quantidade'] ?? ''); ?>"
                        required
                    >

                </div>


                <!-- ================================= -->
                <!-- DESCRIÇÃO -->
                <!-- ================================= -->

                <div class="campo descricao">

                    <label for="descricao">
                        Descrição do produto
                    </label>

                    <textarea
                        id="descricao"
                        name="descricao"
                        placeholder="Descreva as características do produto..."
                        required
                    ><?php echo e($produtoEdicao['descricao'] ?? ''); ?></textarea>

                </div>


                <!-- ================================= -->
                <!-- IMAGEM -->
                <!-- ================================= -->

                <div class="campo imagem">

                    <label for="imagem">
                        Imagem do produto
                    </label>

                    <input
                        type="file"
                        id="imagem"
                        name="imagem"
                        accept="image/jpeg,image/png,image/webp"
                    >


                    <!-- IMAGEM ATUAL NA EDIÇÃO -->

                    <?php if ($produtoEdicao && !empty($produtoEdicao['imagem'])): ?>

                        <div class="imagem-atual">

                            <p>Imagem atual:</p>

                            <img
                                src="<?php echo e($caminhoImagens . rawurlencode(basename($produtoEdicao['imagem']))); ?>"
                                alt="Imagem atual do produto"
                            >

                            <small>
                                Se não selecionar outra imagem,
                                a atual será mantida.
                            </small>

                        </div>

                    <?php endif; ?>


                    <!-- PRÉ-VISUALIZAÇÃO -->

                    <div class="preview">

                        <img
                            id="previewImagem"
                            src=""
                            alt="Pré-visualização da imagem"
                            style="display:none;"
                        >

                        <p id="textoImagem">
                            Selecione uma imagem para visualizar
                        </p>

                    </div>

                </div>

            </div>


            <!-- ================================= -->
            <!-- BOTÕES DO FORMULÁRIO -->
            <!-- ================================= -->

            <?php if ($produtoEdicao): ?>

                <button
                    type="submit"
                    class="btn-atualizar"
                >
                    SALVAR ALTERAÇÕES
                </button>

                <a
                    href="./admProdutos.php"
                    class="btn-cancelar"
                >
                    CANCELAR EDIÇÃO
                </a>

            <?php else: ?>

                <button
                    type="submit"
                    class="btn-cadastrar"
                >
                    CADASTRAR PRODUTO
                </button>

            <?php endif; ?>

        </form>

    </section>


    <!-- ===================================== -->
    <!-- LISTAGEM DOS PRODUTOS -->
    <!-- ===================================== -->

    <section class="produtos">

        <div class="titulo">

            <h2>Produtos cadastrados</h2>

            <p>

                <?php echo $result->num_rows; ?>

                produto(s) registrado(s) na loja.

            </p>

        </div>


        <div class="tabela-container">

            <table class="table">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>IMAGEM</th>
                        <th>NOME</th>
                        <th>PREÇO</th>
                        <th>QUANTIDADE</th>
                        <th>AÇÕES</th>

                    </tr>

                </thead>


                <tbody>

                    <?php if ($result->num_rows > 0): ?>

                        <?php while ($produto = $result->fetch_assoc()): ?>

                            <tr>


                                <!-- ID -->

                                <td>

                                    #<?php echo (int)$produto['idProduto']; ?>

                                </td>


                                <!-- IMAGEM -->

                                <td>

                                    <?php if (!empty($produto['imagem'])): ?>

                                        <img
                                            class="imagem-produto"
                                            src="<?php echo e($caminhoImagens . rawurlencode(basename($produto['imagem']))); ?>"
                                            alt="<?php echo e($produto['nome']); ?>"
                                            loading="lazy"
                                        >

                                    <?php else: ?>

                                        <span class="sem-imagem">
                                            Sem imagem
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- NOME -->

                                <td>

                                    <?php echo e($produto['nome']); ?>

                                </td>


                                <!-- PREÇO -->

                                <td>

                                    R$

                                    <?php echo number_format(
                                        (float)$produto['preco'],
                                        2,
                                        ',',
                                        '.'
                                    ); ?>

                                </td>


                                <!-- QUANTIDADE -->

                                <td>

                                    <?php echo (int)$produto['quantidade']; ?>

                                </td>


                                <!-- AÇÕES -->

                                <td>

                                    <div class="acoes">


                                        <!-- EDITAR -->

                                        <a
                                            href="./admProdutos.php?editar=<?php echo (int)$produto['idProduto']; ?>"
                                            class="btn-editar"
                                        >
                                            EDITAR
                                        </a>


                                        <!-- EXCLUIR -->

                                        <form
                                            method="POST"
                                            onsubmit="return confirm('Deseja realmente excluir este produto?');"
                                        >

                                            <input
                                                type="hidden"
                                                name="csrf_token"
                                                value="<?php echo e($_SESSION['csrf_token']); ?>"
                                            >

                                            <input
                                                type="hidden"
                                                name="acao"
                                                value="excluir"
                                            >

                                            <input
                                                type="hidden"
                                                name="idProduto"
                                                value="<?php echo (int)$produto['idProduto']; ?>"
                                            >

                                            <button
                                                type="submit"
                                                class="btn-excluir"
                                            >
                                                EXCLUIR
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        <?php endwhile; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="6" class="sem-produtos">

                                Nenhum produto cadastrado.

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </section>

</main>


<!-- ========================================= -->
<!-- PRÉ-VISUALIZAÇÃO DA IMAGEM -->
<!-- ========================================= -->

<script src="../JS/previewImg.js"></script>

</body>
</html>
