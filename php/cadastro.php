<?php
// Conectar ao banco de dados
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

// Receber e sanitizar os dados do formulário
$nome = $conn->real_escape_string($_POST['nome']); // Sanitiza o campo nome para evitar SQL Injection
$email = $conn->real_escape_string($_POST['email']); // Sanitiza o campo email
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha para segurança
$telefone = $conn->real_escape_string($_POST['telefone']); // Sanitiza o campo telefone
$endereco = $conn->real_escape_string($_POST['endereco']); // Sanitiza o campo endereço
$cidade = $conn->real_escape_string($_POST['cidade']); // Sanitiza o campo cidade
$estado = $conn->real_escape_string($_POST['estado']); // Sanitiza o campo estado

// Validar os dados
if (empty($nome) || empty($email) || empty($senha) || empty($telefone) || empty($endereco) || empty($cidade) || empty($estado)) {
    echo "Preencha todos os campos obrigatórios."; // Verifica se todos os campos estão preenchidos
    exit; // Encerra o script caso algum campo esteja vazio
}

// Comando SQL para inserir os dados no banco
$sql = "INSERT INTO usuarios (nome, email, senha, telefone, endereco, cidade, estado)
        VALUES ('$nome', '$email', '$senha', '$telefone', '$endereco', '$cidade', '$estado')";

// Executa o comando SQL e verifica se foi bem-sucedido
if ($conn->query($sql) === TRUE) {
    header("Location: ../html/login.html"); // Redireciona para a página de login se a inserção for bem-sucedida
    exit; // Interrompe a execução após o redirecionamento
} else {
    echo "Erro ao cadastrar o usuário."; // Exibe mensagem de erro caso a inserção falhe
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
