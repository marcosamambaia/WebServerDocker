<?php
$host = 'db';
$user = 'user';
$pass = 'user123';
$dbname = 'curriculos';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(" Erro na conexão: " . $conn->connect_error);
}

echo " Conexão com o banco de dados estabelecida com sucesso!";
?>