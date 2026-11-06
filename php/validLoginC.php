<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    include_once(__DIR__ . '/config.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Usando consulta preparada para evitar injeção SQL
    $sql = "SELECT senha FROM clientes WHERE email = ?";
    $verificando = $conexao->prepare($sql);
    $verificando->bind_param("s", $email);
    $verificando->execute();
    $verificando->bind_result($passwordHash);
    $verificando->fetch();
    $verificando->close();

    // Verifica se o hash foi encontrado e compara
    if ($passwordHash && password_verify($password, $passwordHash)) {
        $_SESSION['email'] = $email;
        header("Location: /index.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Email ou senha incorretos. Tente novamente.";
        header("Location: ./login.php");
        exit();
    }
} else {
    header("Location: ./login.php");
    exit();
}
?>
