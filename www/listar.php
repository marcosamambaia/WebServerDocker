<?php
// Conecta ao banco de dados
$conn = new mysqli("db", "root", "root", "curriculos");

// Verifica erro de conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Executa consulta para buscar todos os currículos
$result = $conn->query("SELECT * FROM curriculos ORDER BY id DESC");
?>

<!-- Página HTML com tabela de currículos -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Currículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4"> Currículos Cadastrados</h2>
    <a href="index.php" class="btn btn-secondary mb-3">← Voltar</a>

    <!-- Tabela com os dados -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Mensagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop para exibir cada currículo -->
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= htmlspecialchars($row["nome"]) ?></td>
                <td><?= htmlspecialchars($row["email"]) ?></td>
                <td><?= htmlspecialchars($row["telefone"]) ?></td>
                <td><?= nl2br(htmlspecialchars($row["mensagem"])) ?></td>
                <td>
                    <!-- Link para excluir -->
                    <a href="excluir.php?id=<?= $row["id"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este currículo?')">Excluir</a>
                </td>
            </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>
</body>
</html>