<?php
include '../conexao/conexao.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    $id_usuario = $_SESSION['id_usuario'];
    $descricao = $_POST['descricao'];
    $cambio = $_POST['cambio'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $valor = $_POST['valor'];
    $dispo = $_POST['dispo'];

    $sql = "INSERT INTO detalhes (id_usuario, descricao, cambio, estado, cidade, valor, dispo)
            VALUES (:id_usuario, :descricao, :cambio, :estado, :cidade, :valor, :dispo)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':cambio', $cambio);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':dispo', $dispo);
    $stmt->execute();

    header("Location: ../instrutor.php");
}
?>