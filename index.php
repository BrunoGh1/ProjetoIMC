<?php
session_start(); // Inicia a sessão para acessar os dados armazenados

// Verifica se o usuário já está logado
if (isset($_SESSION['usuario'])) {
    header("Location: php/home.php"); // Redireciona para a página home.php se o usuário estiver logado
    exit; // Interrompe a execução após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- Define o charset da página como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Define as configurações de visualização para dispositivos móveis -->
    <title>Cálculo de IMC</title> <!-- Título da página -->
    <link rel="stylesheet" href="css/style.css"> <!-- Link para o arquivo CSS para estilizar a página -->
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li> <!-- Link para a página inicial -->
                <li><a href="html/cadastro.html">Cadastro</a></li> <!-- Link para a página de cadastro -->
                <li><a href="html/login.html">Login</a></li> <!-- Link para a página de login -->
            </ul>
        </nav>
    </header>
    <main>
        <section class="imc-section">
            <h1>Cálculo de IMC</h1> <!-- Título principal da seção -->
            <form id="imc-form">
                <div class="form-group">
                    <label for="peso">Peso (kg):</label> <!-- Rótulo para o campo de peso -->
                    <input type="number" id="peso" name="peso" step="0.1" required> <!-- Campo de input para o peso -->
                </div>
                <div class="form-group">
                    <label for="altura">Altura (m):</label> <!-- Rótulo para o campo de altura -->
                    <input type="number" id="altura" name="altura" step="0.01" required> <!-- Campo de input para a altura -->
                </div>
                <button type="submit" id="calcular-imc">Calcular IMC</button> <!-- Botão para calcular o IMC -->
            </form>
            <!-- Container de resultado do IMC -->
            <div id="imc-container">
                <h2>Resultado do IMC</h2>
                <p id="imc-result">Seu IMC será exibido aqui.</p> <!-- Exibição do resultado do IMC -->
            </div>
            <!-- Tabela de IMC -->
            <table id="imc-tabela">
                <thead>
                    <tr>
                        <th>IMC</th>
                        <th>Classificação</th>
                    </tr>
                </thead>
                <tbody>
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
    <script src="js/script.js"></script> <!-- Link para o arquivo JavaScript -->
</body>
</html>
