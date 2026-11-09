
<?php

header("Content-Type: application/json; charset=UTF-8");

// CONEXÃO COM BANCO DE DADOS
require_once __DIR__ . "/../php/config.php";

try {

    // CONFIGURAÇÕES
    $limite = 10;

    $offset = isset($_GET["offset"])
        ? max(0, (int) $_GET["offset"])
        : 0;

    // CONSULTA SQL
    $sql = "
        SELECT
            idProduto,
            nome,
            descricao,
            preco,
            quantidade,
            imagem
        FROM produto
        ORDER BY idProduto DESC
        LIMIT ? OFFSET ?
    ";

    // PREPARAÇÃO
    $stmt = $conexao->prepare($sql);

    if (!$stmt) {
        throw new Exception("Erro ao preparar consulta.");
    }

    // BUSCA UM PRODUTO EXTRA PARA VERIFICAR SE EXISTEM MAIS
    $limiteConsulta = $limite + 1;

    $stmt->bind_param("ii", $limiteConsulta, $offset);

    // EXECUÇÃO
    $stmt->execute();

    // RESULTADOS
    $resultado = $stmt->get_result();

    $produtos = $resultado->fetch_all(MYSQLI_ASSOC);

    // VERIFICA SE EXISTEM MAIS PRODUTOS
    $temMais = count($produtos) > $limite;

    if ($temMais) {
        array_pop($produtos);
    }

    // FECHA CONSULTA
    $stmt->close();

    // RETORNO
    echo json_encode([

        "success" => true,

        "produtos" => $produtos,

        "temMais" => $temMais,

        "quantidade" => count($produtos)

    ], JSON_UNESCAPED_UNICODE);

} catch (Throwable $e) {

    error_log($e->getMessage());

    http_response_code(500);

    echo json_encode([

        "success" => false,

        "message" => "Erro ao carregar os produtos."

    ], JSON_UNESCAPED_UNICODE);

}

?>
