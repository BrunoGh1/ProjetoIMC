<?php
session_start(); // Inicia a sessão para manipular os dados armazenados

session_destroy(); // Destrói a sessão, desconectando o usuário

header("Location: ../index.php"); // Redireciona o usuário para a página inicial após o logout

exit; // Interrompe a execução do script após o redirecionamento
?>
