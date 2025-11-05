<?php
// Verifica se o ID foi passado via GET
if (isset($_GET["id"])) {
    // Conecta ao banco
    $conn = new mysqli("db", "user", "user123", "curriculos");

    // Verifica erro de conexão
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Prepara e executa a exclusão
    $id = intval($_GET["id"]);
    $stmt = $conn->prepare("DELETE FROM curriculos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Redireciona de volta para a listagem
header("Location: listar.php");
exit;