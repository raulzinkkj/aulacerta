<?php
include '../conexao/conexao.php';

$estado = $_GET['estado'];

$sql = "SELECT * FROM municipios WHERE uf_estado = :estado";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(":estado", $estado);
$stmt->execute();

$cidades = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($cidades);