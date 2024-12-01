<?php
session_start(); // Inicia a sessão para gerenciar os dados do usuário logado

$servername = "localhost"; // Define o servidor do banco de dados
$username = "root"; // Define o nome de usuário para a conexão com o banco
$password = ""; // Define a senha para a conexão com o banco
$database = "projeto_imc"; // Define o nome do banco de dados a ser utilizado

// Estabelece a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados."); // Exibe mensagem de erro e encerra a execução
}

// Recebe os dados do formulário de login
$email = $_POST['email']; // Recebe o email do usuário
$senha = $_POST['senha']; // Recebe a senha do usuário

// Comando SQL para buscar o usuário no banco de dados
$sql = "SELECT nome, senha FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql); // Prepara a consulta SQL
$stmt->bind_param("s", $email); // Vincula o parâmetro para a consulta SQL (email)
$stmt->execute(); // Executa a consulta
$result = $stmt->get_result(); // Obtém o resultado da consulta

// Verifica se algum usuário foi encontrado com o email fornecido
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Obtém os dados do usuário encontrado
    // Verifica se a senha fornecida é válida
    if (password_verify($senha, $user['senha'])) {
        $_SESSION['usuario'] = $user['nome']; // Salva o nome do usuário na sessão
        header("Location: home.php"); // Redireciona para a página home.php
        exit; // Interrompe a execução após o redirecionamento
    } else {
        echo "Senha incorreta."; // Exibe mensagem caso a senha esteja incorreta
    }
} else {
    echo "Usuário não encontrado."; // Exibe mensagem caso o usuário não seja encontrado
}

// Fecha a preparação da consulta e a conexão com o banco
$stmt->close();
$conn->close();
?>
