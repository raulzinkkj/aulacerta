
<?php
include '../conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = $_POST['senha_usuario'];

    $sql = "INSERT INTO usuario (email_usuario, senha_usuario) VALUES (:email_usuario, :senha_usuario)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email_usuario', $email_usuario);
    $stmt->bindParam(':senha_usuario', $senha_usuario);
    $stmt->execute();

    header("Location: ../login.php");
}
?>