<?php
include '../conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica se os campos existem
    $id_usuario = $_POST['id_usuario'] ?? null;
    $id_instrutor = $_POST['id'] ?? null;
    $nome_agendamento = $_POST['nome_agendamento'] ?? '';
    $valor_agendamento = $_POST['valor_agendamento'] ?? '';
    $horario_agendamento = $_POST['horario_agendamento'] ?? '';

    // Verifica se os dias foram enviados
    $dia_semana_agendamento = isset($_POST['dia_semana_agendamento'])
        ? implode(",", $_POST['dia_semana_agendamento'])
        : '';

    try {

        $sql = "INSERT INTO agendamento 
        (
            id_usuario,
            id_instrutor,
            nome_agendamento,
            dia_semana_agendamento,
            valor_agendamento,
            horario_agendamento
        ) 
        VALUES 
        (
            :id_usuario,
            :id_instrutor,
            :nome_agendamento,
            :dia_semana_agendamento,
            :valor_agendamento,
            :horario_agendamento
        )";

        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':id_instrutor', $id_instrutor, PDO::PARAM_INT);
        $stmt->bindParam(':nome_agendamento', $nome_agendamento);
        $stmt->bindParam(':dia_semana_agendamento', $dia_semana_agendamento);
        $stmt->bindParam(':valor_agendamento', $valor_agendamento);
        $stmt->bindParam(':horario_agendamento', $horario_agendamento);

        $stmt->execute();

        header("Location: ../minhas_aulas.php");
        exit;
    } catch (PDOException $e) {

        echo "Erro ao salvar agendamento: " . $e->getMessage();
    }
}
