
<?php
include '../conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_usuario = $_POST['nome_usuario'];
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
    $cargo_usuario = $_POST['cargo_usuario'];
    $senhaHash = password_hash($senha_usuario, PASSWORD_DEFAULT);

    //Salvar foto

    $fotoCaminho = null;

    if (isset($_FILES['foto_usuario']) && $_FILES['foto_usuario']['error'] === 0) {

        $arquivo = $_FILES['foto_usuario'];

        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        $permitidos = ['jpg', 'jpeg', 'png'];

        if (!in_array($extensao, $permitidos)) {
            die("Formato Inválido");
        }

        if ($arquivo['size'] > 2 * 1024 * 1024) {
            die("Arquivo muito grande");
        }

        if (!is_dir("../uploads")) {
            mkdir("../uploads", 0755, true);
        }

        $novoNome = uniqid() . "." . $extensao;
        $pasta = "../uploads/";
        $caminhoFisico = $pasta . $novoNome;
        $caminhoBanco = "uploads/" . $novoNome;

        if (move_uploaded_file($arquivo['tmp_name'], $caminhoFisico)) {
            $fotoCaminho = $caminhoBanco;
        } else {
            die("Erro ao enviar imagem");
        }
    }
    
    if (empty($cargo_usuario)) {
        $cargo_usuario = 'Aluno';
    }

    $sql = "INSERT INTO usuario (email_usuario, senha_usuario, foto_usuario, nome_usuario, cargo_usuario) 
            VALUES (:email_usuario, :senha_usuario, :foto_usuario, :nome_usuario, :cargo_usuario)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email_usuario', $email_usuario);
    $stmt->bindParam(':senha_usuario', $senhaHash);
    $stmt->bindParam(':foto_usuario', $fotoCaminho);
    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->bindParam(':cargo_usuario', $cargo_usuario);

    $stmt->execute();

    header("Location: ../index.php");
}
?>