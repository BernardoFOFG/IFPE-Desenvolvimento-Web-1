<?php
require 'main.php';

$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;

$stmt = $conn->prepare("SELECT * FROM USUARIO WHERE USUARIO_EMAIL = :email AND USUARIO_SENHA = :senha");
$stmt->execute([
    'email' => $email,
    'senha' => $senha,
]);

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);

if (sizeof($data) == 0) {
    http_response_code(401);
    exit();
}

$user = $data[0];
$_SESSION['user'] = $user;
http_response_code(200);
session_start();
