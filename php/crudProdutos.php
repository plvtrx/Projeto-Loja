
<?php

// =============================================
// 1. CONFIGURAÇÕES DE IMAGENS
// =============================================

// Pasta física onde as imagens serão armazenadas

define('PASTA_PRODUTOS', __DIR__ . '/../IMG/produtos/');

// =============================================
// 2. FUNÇÕES AUXILIARES
// =============================================

// ESCAPAR HTML

function e($valor)
{
    return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
}

// REDIRECIONAR COM MENSAGEM

function redirecionar($mensagem)
{
    $_SESSION['mensagem'] = $mensagem;

    header("Location: ./admProdutos.php");

    exit();
}

// =============================================
// EXCLUIR IMAGEM DA PASTA
// =============================================

function apagarImagem($nome)
{
    if (empty($nome)) {
        return;
    }

    $caminho = PASTA_PRODUTOS . basename($nome);

    if (is_file($caminho)) {
        unlink($caminho);
    }
}

// =============================================
// ENVIAR IMAGEM PARA A PASTA IMG/PRODUTOS
// =============================================

function enviarImagem()
{

    // VERIFICAR SE UMA IMAGEM FOI ENVIADA

    if (
        !isset($_FILES['imagem']) ||
        $_FILES['imagem']['error'] === UPLOAD_ERR_NO_FILE
    ) {

        return [
            'nome' => null,
            'erro' => null
        ];

    }

    // VERIFICAR ERROS DO UPLOAD

    if ($_FILES['imagem']['error'] !== UPLOAD_ERR_OK) {

        return [
            'nome' => null,
            'erro' => 'Erro ao enviar a imagem.'
        ];

    }

    // LIMITE DE 5 MB

    if ($_FILES['imagem']['size'] > 5 * 1024 * 1024) {

        return [
            'nome' => null,
            'erro' => 'A imagem deve ter no máximo 5 MB.'
        ];

    }

    $arquivo = $_FILES['imagem']['tmp_name'];

    // VERIFICAR FORMATO REAL DA IMAGEM

    $finfo = new finfo(FILEINFO_MIME_TYPE);

    $tipo = $finfo->file($arquivo);

    $formatosPermitidos = [

        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp'

    ];

    if (
        !isset($formatosPermitidos[$tipo]) ||
        getimagesize($arquivo) === false
    ) {

        return [
            'nome' => null,
            'erro' => 'Formato inválido. Utilize JPG, PNG ou WEBP.'
        ];

    }

    // CRIAR PASTA CASO NÃO EXISTA

    if (!is_dir(PASTA_PRODUTOS)) {

        if (
            !mkdir(PASTA_PRODUTOS, 0755, true) &&
            !is_dir(PASTA_PRODUTOS)
        ) {

            return [
                'nome' => null,
                'erro' => 'Não foi possível criar a pasta de imagens.'
            ];

        }

    }

    // GERAR NOME ÚNICO PARA A IMAGEM

    $nomeImagem = bin2hex(random_bytes(16))
        . "."
        . $formatosPermitidos[$tipo];

    // SALVAR IMAGEM EM IMG/PRODUTOS

    if (
        !move_uploaded_file(
            $arquivo,
            PASTA_PRODUTOS . $nomeImagem
        )
    ) {

        return [
            'nome' => null,
            'erro' => 'Não foi possível salvar a imagem.'
        ];

    }

    return [
        'nome' => $nomeImagem,
        'erro' => null
    ];

}

// =============================================
// 3. PROCESSAR FORMULÁRIOS
// =============================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // =========================================
    // VERIFICAR TOKEN CSRF
    // =========================================

    if (
        !isset($_POST['csrf_token']) ||
        !isset($_SESSION['csrf_token']) ||
        !hash_equals(
            $_SESSION['csrf_token'],
            $_POST['csrf_token']
        )
    ) {

        redirecionar("Solicitação inválida. Tente novamente.");

    }

    $acao = $_POST['acao'] ?? '';

    // =========================================
    // CADASTRAR PRODUTO
    // =========================================

    if ($acao === 'cadastrar') {

        $nome = trim($_POST['nome'] ?? '');

        $descricao = trim($_POST['descricao'] ?? '');

        $preco = trim($_POST['preco'] ?? '');

        $quantidade = filter_var(
            $_POST['quantidade'] ?? null,
            FILTER_VALIDATE_INT
        );

        // VALIDAR CAMPOS

        if (
            $nome === '' ||
            strlen($nome) > 100 ||
            $descricao === '' ||
            !preg_match('/^\d{1,8}(\.\d{1,2})?$/', $preco) ||
            $quantidade === false ||
            $quantidade === null ||
            $quantidade < 0
        ) {

            redirecionar("Preencha todos os campos corretamente.");

        }

        // ENVIAR IMAGEM

        $upload = enviarImagem();

        if ($upload['erro']) {

            redirecionar($upload['erro']);

        }

        $imagem = $upload['nome'];

        // INSERT NO BANCO DE DADOS

        $sql = "INSERT INTO produto
                (nome, descricao, preco, quantidade, imagem)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);

        if (!$stmt) {

            apagarImagem($imagem);

            redirecionar("Erro ao preparar o cadastro.");

        }

        $stmt->bind_param(
            "sssis",
            $nome,
            $descricao,
            $preco,
            $quantidade,
            $imagem
        );

        if ($stmt->execute()) {

            $stmt->close();

            redirecionar("Produto cadastrado com sucesso!");

        }

        $stmt->close();

        // APAGAR IMAGEM CASO O CADASTRO FALHE

        apagarImagem($imagem);

        redirecionar("Não foi possível cadastrar o produto.");

    }

    // =========================================
    // ATUALIZAR PRODUTO
    // =========================================

    if ($acao === 'atualizar') {

        $idProduto = filter_var(
            $_POST['idProduto'] ?? null,
            FILTER_VALIDATE_INT
        );

        $nome = trim($_POST['nome'] ?? '');

        $descricao = trim($_POST['descricao'] ?? '');

        $preco = trim($_POST['preco'] ?? '');

        $quantidade = filter_var(
            $_POST['quantidade'] ?? null,
            FILTER_VALIDATE_INT
        );

        // VALIDAR CAMPOS

        if (
            !$idProduto ||
            $idProduto < 1 ||
            $nome === '' ||
            strlen($nome) > 100 ||
            $descricao === '' ||
            !preg_match('/^\d{1,8}(\.\d{1,2})?$/', $preco) ||
            $quantidade === false ||
            $quantidade === null ||
            $quantidade < 0
        ) {

            redirecionar("Preencha os dados corretamente.");

        }

        // BUSCAR IMAGEM ATUAL

        $sql = "SELECT imagem FROM produto WHERE idProduto = ?";

        $stmt = $conexao->prepare($sql);

        if (!$stmt) {

            redirecionar("Erro ao buscar o produto.");

        }

        $stmt->bind_param("i", $idProduto);

        $stmt->execute();

        $stmt->bind_result($imagemAtual);

        if (!$stmt->fetch()) {

            $stmt->close();

            redirecionar("Produto não encontrado.");

        }

        $stmt->close();

        // ENVIAR NOVA IMAGEM, SE EXISTIR

        $upload = enviarImagem();

        if ($upload['erro']) {

            redirecionar($upload['erro']);

        }

        // MANTER IMAGEM ATUAL SE NÃO HOUVER NOVA

        $imagem = $upload['nome'] ?? $imagemAtual;

        // ATUALIZAR BANCO DE DADOS

        $sql = "UPDATE produto
                SET nome = ?,
                    descricao = ?,
                    preco = ?,
                    quantidade = ?,
                    imagem = ?
                WHERE idProduto = ?";

        $stmt = $conexao->prepare($sql);

        if (!$stmt) {

            apagarImagem($upload['nome']);

            redirecionar("Erro ao preparar a atualização.");

        }

        $stmt->bind_param(
            "sssisi",
            $nome,
            $descricao,
            $preco,
            $quantidade,
            $imagem,
            $idProduto
        );

        if ($stmt->execute()) {

            $stmt->close();

            // APAGAR IMAGEM ANTIGA APÓS ATUALIZAÇÃO

            if ($upload['nome'] && $imagemAtual) {

                apagarImagem($imagemAtual);

            }

            redirecionar("Produto atualizado com sucesso!");

        }

        $stmt->close();

        // APAGAR NOVA IMAGEM CASO A ATUALIZAÇÃO FALHE

        apagarImagem($upload['nome']);

        redirecionar("Não foi possível atualizar o produto.");

    }

    // =========================================
    // EXCLUIR PRODUTO
    // =========================================

    if ($acao === 'excluir') {

        $idProduto = filter_var(
            $_POST['idProduto'] ?? null,
            FILTER_VALIDATE_INT
        );

        if (!$idProduto || $idProduto < 1) {

            redirecionar("Produto inválido.");

        }

        // BUSCAR IMAGEM DO PRODUTO

        $sql = "SELECT imagem FROM produto WHERE idProduto = ?";

        $stmt = $conexao->prepare($sql);

        if (!$stmt) {

            redirecionar("Erro ao buscar o produto.");

        }

        $stmt->bind_param("i", $idProduto);

        $stmt->execute();

        $stmt->bind_result($imagem);

        if (!$stmt->fetch()) {

            $stmt->close();

            redirecionar("Produto não encontrado.");

        }

        $stmt->close();

        // EXCLUIR PRODUTO DO BANCO

        $sql = "DELETE FROM produto WHERE idProduto = ?";

        $stmt = $conexao->prepare($sql);

        if (!$stmt) {

            redirecionar("Erro ao preparar a exclusão.");

        }

        $stmt->bind_param("i", $idProduto);

        if (
            $stmt->execute() &&
            $stmt->affected_rows === 1
        ) {

            $stmt->close();

            // APAGAR IMAGEM DA PASTA IMG/PRODUTOS

            apagarImagem($imagem);

            redirecionar("Produto excluído com sucesso!");

        }

        $stmt->close();

        redirecionar("Não foi possível excluir o produto.");

    }

    // =========================================
    // AÇÃO INVÁLIDA
    // =========================================

    redirecionar("Ação não reconhecida.");

}

// =============================================
// 4. CARREGAR PRODUTO PARA EDIÇÃO
// =============================================

$produtoEdicao = null;

if (isset($_GET['editar'])) {

    $idEditar = filter_var(
        $_GET['editar'],
        FILTER_VALIDATE_INT
    );

    if ($idEditar && $idEditar > 0) {

        $sql = "SELECT
                    idProduto,
                    nome,
                    descricao,
                    preco,
                    quantidade,
                    imagem
                FROM produto
                WHERE idProduto = ?";

        $stmt = $conexao->prepare($sql);

        if (!$stmt) {

            redirecionar("Erro ao carregar produto.");

        }

        $stmt->bind_param("i", $idEditar);

        $stmt->execute();

        $stmt->bind_result(
            $id,
            $nome,
            $descricao,
            $preco,
            $quantidade,
            $imagem
        );

        if ($stmt->fetch()) {

            $produtoEdicao = [

                'idProduto' => $id,
                'nome' => $nome,
                'descricao' => $descricao,
                'preco' => $preco,
                'quantidade' => $quantidade,
                'imagem' => $imagem

            ];

        }

        $stmt->close();

    }

    if (!$produtoEdicao) {

        $_SESSION['mensagem'] = "Produto não encontrado.";

        header("Location: ./admProdutos.php");

        exit();

    }

}

?>
