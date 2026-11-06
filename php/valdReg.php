<?php
session_start();
if (isset($_POST['submit'])) {

    include_once(__DIR__ . "/config.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['CPF'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($password != $passwordConf) {
        header('Location: ./register.php'); 
        $_SESSION['error_message'] = "Verifique se ambas as senhas correspondem";
         if (!isset($_SESSION)) {
            unset($_SESSION['email']);
            unset($_SESSION['password']);
        } exit();
    } else {
        $result = mysqli_query($conexao, "INSERT INTO clientes(nome, email, CPF, senha) values('$nome', '$email', '$cpf', '$passwordHash')");
        header('Location: ./login.php');
        exit();
    }
}
