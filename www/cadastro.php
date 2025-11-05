<?php
// Ativa a exibição de erros para facilitar o debug (recomenda-se comentar em produção)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Cria conexão com o banco de dados MySQL (host, usuário, senha, nome do banco)
    $conn = new mysqli("db", "user", "user123", "curriculos");

    // Verifica se houve erro na conexão
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Captura os dados enviados pelo formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $mensagem = $_POST["mensagem"];

    // Prepara a query SQL para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO curriculos (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $telefone, $mensagem);

    // Executa a inserção
    $stmt->execute();

    // Exibe mensagem de sucesso
    echo "<p>✅ Currículo cadastrado com sucesso!</p>";
    echo '<p><a href="index.php">Voltar</a></p>';
    exit;
}
?>

<!-- Formulário HTML com Bootstrap -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Currículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">📝 Cadastrar Currículo</h2>

    <!-- Formulário de cadastro -->
    <form method="POST">
        <!-- Campo Nome -->
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <!-- Campo E-mail -->
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <!-- Campo Telefone -->
        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control">
        </div>

        <!-- Campo Mensagem -->
        <div class="mb-3">
            <label class="form-label">Mensagem</label>
            <textarea name="mensagem" class="form-control" rows="4"></textarea>
        </div>

        <!-- Botões -->
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>