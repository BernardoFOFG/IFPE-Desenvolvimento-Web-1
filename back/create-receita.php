<?php
require 'main.php';

$nomeReceita = $_POST['nomeReceita'] ?? null;
$descricaoReceita = $_POST['descricaoReceita'] ?? null;
$ingredientesReceita = $_POST['ingredientesReceita'] ?? null;
$modoPreparo = $_POST['modoPreparo'] ?? null;
$idUsuario = $_SESSION['user']['USUARIO_id'] ?? null;


$stmt = $conn->prepare("INSERT INTO RECEITA VALUES(null, :nomeReceita, :descricaoReceita, :ingredientesReceita, :modoPreparo, :idUsuario)");
$stmt->execute([
    'nomeReceita' => $nomeReceita,
    'descricaoReceita' => $descricaoReceita,
    'ingredientesReceita' => $ingredientesReceita,
    'modoPreparo' => $modoPreparo,
    'idUsuario' => $idUsuario,
]);
