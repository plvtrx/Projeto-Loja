<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    include_once(__DIR__ . '/config.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Usando consulta preparada para evitar injeção SQL
    $sql = "SELECT senha FROM admin WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($passwordHash);
    $stmt->fetch();
    $stmt->close();

    // Verifica se o hash foi encontrado e compara
    if ($passwordHash && password_verify($password, $passwordHash)) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password; // Armazenar a senha em sessão não é recomendado
        header("Location: ./central.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Email ou senha incorretos. Tente novamente.";
        header("Location: ./loginCentral.php");
        exit();
    }
} else {
    header("Location: ./loginCentral.php");
    exit();
}
?>
