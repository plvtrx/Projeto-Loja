<?php
session_start();

include_once(__DIR__ . "/config.php");

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)) {
    header('Location: ./loginCentral.php');
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    echo "<div id='error-message' class='error-message'>" . $_SESSION['error_message'] . "</div>";
    // Limpar a mensagem após exibi-la
    unset($_SESSION['error_message']);
}
$logado = $_SESSION['email'];

if(!empty($_GET["search"])){
    $data = $_GET['search'];
    $sql = "SELECT * FROM clientes WHERE idCliente LIKE '%$data%' OR nome LIKE '%$data%' OR email LIKE '%$data%' ORDER BY idCliente ASC";
} else {
    $sql = "SELECT * FROM clientes ORDER BY idCliente ASC";
}

$result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="/CSS/admClientes.css">
    <script defer src="/JS/gestao.js"></script>
    <title>E-commerce</title>
</head>

<body>
    <main>
        <h1>Bem-vindo <?php echo $logado ?></h1>

        <div class="sair">
            <a href="./central.php">VOLTAR</a>
        </div>

        <div class="search">
            <input type="search" class="boxSearch" name="search" placeholder="Pesquisar" id='search'>
            <button onclick="searchData()">🔍</button>
        </div>

        <table class="table">
            <thead>
                <tr class="table-color">
                    <th scope="col">#</th>
                    <th scope="col">NOME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">CPF</th>
                    <th scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['idCliente'] . "</td>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $user_data['email'] . "</td>";
                    echo "<td>" . $user_data['cpf'] . "</td>";
                    echo "<td class='acoes'>"
                        . "<div class='update'><a href='./edit.php?id=$user_data[idCliente]'>🖊</a></div>"
                        . "<div class='delete'><a href='./delete.php?id=$user_data[idCliente]'>🗑</a></div>" .
                        "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>