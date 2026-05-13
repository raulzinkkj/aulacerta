<?php
session_start();

include '../conexao/conexao.php';

$email_usuario = $_POST['email_usuario'];
$senha_usuario = $_POST['senha_usuario'];


$sql = "SELECT * FROM usuario WHERE email_usuario = :email_usuario";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':email_usuario', $email_usuario);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($senha_usuario, $user['senha_usuario'])) {
    $_SESSION['email_usuario'] = $user['email_usuario'];
    $_SESSION['id_usuario'] = $user['id_usuario'];
    $_SESSION['nome_usuario'] = $user['nome_usuario'];
    $_SESSION['cargo_usuario'] = $user['cargo_usuario'];

    if ($user['cargo_usuario'] == 'Instrutor') {
        $sqlDetalhes = "SELECT * FROM detalhes WHERE id_usuario = ?";
        $stmtDetalhes = $conexao->prepare($sqlDetalhes);
        $stmtDetalhes->execute([$user['id_usuario']]);

        $detalhes = $stmtDetalhes->fetch();

        if ($detalhes) {
            header("Location: aulas.php");
            exit;
        } else {
            header("Location: ../instrutor.php");
        }
    } elseif ($user['cargo_usuario'] == 'Aluno') {
        header("Location: ../dashboard.php");
    } else {
        header("Location: ../dashboard.php");
        exit;
    }
} else {
    echo "Email ou Senha Inválidos";
}
