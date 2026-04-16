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

if ($user) {
    $_SESSION['email_usuario'] = $user['email_usuario'];
    $_SESSION['id'] = $user['id_usuario'];

    header("Location: ../dashboard.php");
    exit;
}else{
    echo "Email ou Senha Inválidos";
}
?>