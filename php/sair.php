<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['senha']);
session_destroy(); // Limpa todos os dados da sessão
header('Location: ./loginCentral.php'); // Redireciona para a página de login
exit(); // Garante que o script pare aqui

?>