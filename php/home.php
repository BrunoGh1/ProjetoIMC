<?php
session_start(); // Inicia a sessão para verificar dados do usuário

// Verifica se o usuário está logado, redirecionando caso não esteja
if (!isset($_SESSION['usuario'])) {
    header("Location: ../html/login.html"); // Redireciona para a página de login
    exit; // Interrompe o script após o redirecionamento
}

$usuario = $_SESSION['usuario']; // Armazena o nome do usuário na variável
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Ajusta a escala da página para dispositivos móveis -->
    <title>Bem-vindo</title> <!-- Título da página -->
    <link rel="stylesheet" href="../css/style.css"> <!-- Importa o arquivo CSS para estilizar a página -->
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php" class="active">Home</a></li> <!-- Link para a página inicial -->
                <li><a href="logout.php">Logout</a></li> <!-- Link para logout -->
            </ul>
        </nav>
    </header>
    
    <main>
        <!-- Seção de boas-vindas ao usuário -->
        <section class="welcome-section">
            <h1>Bem-vindo, <?php echo htmlspecialchars($usuario); ?>!</h1> <!-- Exibe o nome do usuário na tela -->
            <p>Estamos felizes em tê-lo aqui. Explore as funcionalidades disponíveis.</p>
        </section>

        <!-- Seção para o cálculo de IMC -->
        <section class="imc-section">
            <h1>Cálculo de IMC</h1>
            <form id="imc-form"> <!-- Formulário para calcular o IMC -->
                <div class="form-group">
                    <label for="peso">Peso (kg):</label> <!-- Label para o campo de peso -->
                    <input type="number" id="peso" name="peso" step="0.1" required> <!-- Campo para inserir o peso -->
                </div>
                <div class="form-group">
                    <label for="altura">Altura (m):</label> <!-- Label para o campo de altura -->
                    <input type="number" id="altura" name="altura" step="0.01" required> <!-- Campo para inserir a altura -->
                </div>
                <button type="submit" id="calcular-imc">Calcular IMC</button> <!-- Botão para calcular o IMC -->
            </form>
            
            <!-- Container para mostrar o resultado do IMC -->
            <div id="imc-container">
                <h2>Resultado do IMC</h2>
                <p id="imc-result">Seu IMC será exibido aqui.</p> <!-- Exibe o IMC calculado -->
            </div>
            
            <!-- Tabela com as faixas de IMC e suas classificações -->
            <table id="imc-tabela">
                <thead>
                    <tr>
                        <th>IMC</th> <!-- Cabeçalho da coluna de IMC -->
                        <th>Classificação</th> <!-- Cabeçalho da coluna de classificação -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Linhas com as faixas de IMC e suas respectivas classificações -->
                    <tr>
                        <td>Menos de 18,5</td>
                        <td>Abaixo do peso</td>
                    </tr>
                    <tr>
                        <td>18,5 a 24,9</td>
                        <td>Peso normal</td>
                    </tr>
                    <tr>
                        <td>25 a 29,9</td>
                        <td>Sobrepeso</td>
                    </tr>
                    <tr>
                        <td>30 a 34,9</td>
                        <td>Obesidade grau I</td>
                    </tr>
                    <tr>
                        <td>35 a 39,9</td>
                        <td>Obesidade grau II</td>
                    </tr>
                    <tr>
                        <td>Mais de 40</td>
                        <td>Obesidade grau III</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    
    <script src="../js/script.js"></script> <!-- Importa o script JavaScript -->
</body>
</html>
