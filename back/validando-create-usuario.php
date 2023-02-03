<?php
include 'main.php';

$stmt = $conn->query("SELECT USUARIO_EMAIL from USUARIO where USUARIO_EMAIL != 'null' 
");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
