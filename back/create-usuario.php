<?php
require 'main.php';

$nome = $_POST['nome'] ?? null;
$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;

$stmt = $conn->prepare("INSERT INTO USUARIO VALUES (null, :nome, :email, :senha)");
$stmt->execute([
    'nome' => $nome,
    'email' => $email,
    'senha' => $senha,
]);
