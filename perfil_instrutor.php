<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit;
}
include 'conexao/conexao.php';

$sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(":id_usuario", $_SESSION['id_usuario']);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        .menu {
            display: grid;
            grid-template-columns: 1fr 4fr;
            grid-template-rows: auto auto auto 1fr;
            height: 100vh;
            gap: 0;
            padding: 0;
            background: rgb(247, 248, 250);
        }

        .menu_lateral {
            background: rgb(8, 28, 55);
            padding: 20px;
            display: flex;
            flex-direction: column;
            grid-row: 1 / -1;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            margin-bottom: 30px;
        }

        .logo img {
            width: 60px;
            height: 60px;
        }

        .topicos {
            margin-bottom: 150px;
        }

        .acoes {
            border-top: solid 1px white;
            margin-top: 30px;
            padding-top: 20px;
        }

        .topicos,
        .acoes {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .topico,
        .acao {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
        }

        .topico img,
        .acao img {
            width: 25px;
            height: 25px;
        }

        .topico h2,
        .acao h2 {
            font-size: 1rem;
            font-weight: normal;
        }

        header {
            grid-column: 2 / 3;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            border-bottom: solid 1px #e0e4ea;
            background: white;
        }

        .pessoa {
            border-radius: 50%;
            height: 40px;
            width: 40px;
        }

        .sino {
            height: 30px;
            width: 30px;
            margin-right: 20px;
        }

        .perfil {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .descricao {
            display: flex;
            flex-direction: column;
            margin-left: 4px;
        }

        .down {
            width: 20px;
            height: 20px;
            margin-left: 40px;
        }

        .barras {
            width: 40px;
            height: 40px;
        }

        .descricao span {
            color: lightgrey;
        }

        .bemvindo {
            display: flex;
            height: 80px;
            justify-content: space-between;
            align-items: center;
            grid-column: 2 / 3;
        }

        .bemvindo2 {
            margin-left: 20px;
        }

        .botao {
            width: 175px;
            height: 35px;
            border-radius: 5px;
            background: rgb(15, 98, 216);
            border: none;
            color: white;
            font-weight: bold;
            margin-right: 30px;
            cursor: pointer;
        }

        .resumo {
            display: flex;
            gap: 20px;
            padding: 20px;
            grid-column: 2 / 3;
        }

        .card_resumo {
            flex: 1;
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 20px;
            border: solid 1px #e0e4ea;
            border-radius: 10px;
            background: white;
        }

        .card_resumo div {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .card_resumo strong {
            font-size: 1.4rem;
        }

        .card_resumo a {
            color: rgb(15, 98, 216);
            font-size: 0.85rem;
            text-decoration: none;
        }

        .card_resumo img {
            width: 30px;
            height: 30px;
        }

        .circulo {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .circulo.user {
            background: rgb(225, 232, 255);
        }

        .circulo.star {
            background: rgb(255, 243, 224);
        }

        .circulo.message {
            background: rgb(220, 245, 235);
        }

        .instrutores {
            grid-column: 2 / 3;
            padding: 0 20px 20px 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .instrutores_header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .instrutores_header a {
            color: rgb(15, 98, 216);
            text-decoration: none;
            font-size: 0.9rem;
        }

        .cards_instrutores {
            display: flex;
            gap: 15px;
        }

        .card_instrutor {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 15px;
            border: solid 1px #e0e4ea;
            border-radius: 10px;
            background: white;
            position: relative;
        }

        .card_topo {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .info_instrutor {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info_instrutor strong {
            font-size: 1rem;
        }

        .info_instrutor span {
            font-size: 0.85rem;
            color: #555;
        }

        .info_instrutor .credenciado {
            color: rgb(22, 163, 74);
            font-size: 0.85rem;
        }

        .card_instrutor>p {
            font-size: 0.85rem;
            color: #555;
            line-height: 1.4;
        }

        .card_instrutor>span {
            font-size: 0.85rem;
            color: #555;
        }

        .card_rodape {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
        }

        .card_rodape strong {
            font-size: 1rem;
        }

        .card_rodape button {
            height: 32px;
            padding: 0 16px;
            border-radius: 5px;
            border: solid 1px rgb(15, 98, 216);
            background: white;
            font-size: 0.85rem;
            color: rgb(15, 98, 216);
        }

        .foto_instrutor {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #e0e4ea;
        }

        .favorito {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 30px;
            height: 30px;
        }

        .destaque {
            background: rgb(15, 98, 216);
            padding: 2px;
            border-radius: 6px;
        }

        .cursor {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <section class="menu">

        <header>
            <div class="barras">
                <img src="img/barras.svg" alt="">
            </div>
            <div class="perfil">
                <img src="img/bell.svg" alt="" class="sino">
                <img src="<?php echo $usuario['foto_usuario']; ?>" alt="" class="pessoa" onclick="perfil()">
                <div class="descricao">
                    <strong><?php echo $_SESSION['nome_usuario']; ?></strong>
                    <span><?php echo $usuario['cargo_usuario']; ?></span>
                </div>
                <div class="down">
                    <img src="img/down.svg" alt="">
                </div>
            </div>
        </header>

        <div class="menu_lateral">
            <div class="logo">
                <img src="img/user.svg" alt="">
                <h1>AulaCerta</h1>
            </div>
            <div class="topicos">
                <div class="topico destaque" onclick="dashboard()">
                    <img src="img/house.svg" alt="">
                    <h2>Dashboard</h2>
                </div>
                <div class="topico cursor" onclick="pesquisar()">
                    <img src="img/search.svg" alt="">
                    <h2>Buscar instrutores</h2>
                </div>
                <div class="topico">
                    <img src="img/calendar.svg" alt="">
                    <h2>Minhas Aulas</h2>
                </div>
                <div class="topico">
                    <img src="img/message.svg" alt="">
                    <h2>Mensagens</h2>
                </div>
                <div class="topico">
                    <img src="img/hearth.svg" alt="">
                    <h2>Favoritos</h2>
                </div>
            </div>
            <div class="acoes">
                <div class="acao">
                    <img src="img/config.svg" alt="">
                    <h2>Configurações</h2>
                </div>
                <div class="acao cursor" onclick="sair()">
                    <img src="img/sair.svg" alt="">
                    <h2>Sair</h2>
                </div>
            </div>
        </div>



        <div class="instrutores">
            <div class="instrutores_header">

            </div>

            <div class="cards_instrutores">
                <?php
                include "conexao/conexao.php";

                $id = $_GET['id'] ?? null;

                $instrutores = "SELECT 
                                    u.id_usuario, 
                                    u.nome_usuario, 
                                    u.foto_usuario, 
                                    u.cargo_usuario, 
                                    d.descricao, 
                                    d.cambio, 
                                    d.estado, 
                                    d.cidade, 
                                    d.valor, 
                                    d.dispo, 
                                    m.nome_municipio 
                                FROM usuario AS u 
                                INNER JOIN detalhes AS d ON u.id_usuario = d.id_usuario
                                INNER JOIN municipios AS m ON m.id_municipio = d.cidade
                                WHERE u.id_usuario = :id";

                $stmt = $conexao->prepare($instrutores);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='card_instrutor'>";
                    echo "<div class='card_topo'>";
                    echo "<img src='{$linha['foto_usuario']}' class='foto_instrutor'>";
                    echo "<div class='info_instrutor'>";
                    echo "<strong>{$linha['nome_usuario']}</strong>";
                    echo "<span>⭐ 4.9 (124)</span>";
                    echo "<span class='credenciado'>🚗 Instrutor credenciado</span>";
                    echo "</div>";
                    echo "</div>";
                    echo "<p><strong>Sobre mim: </strong>{$linha['descricao']}</p>";
                    echo "<span><strong>Tipo de Carro: </strong>{$linha['cambio']}</span>";
                    echo "<span><strong>Região/Cidade: </strong>📍 {$linha['nome_municipio']} - {$linha['estado']}</span>";
                    echo "<span><strong>Disponibilidade: </strong>{$linha['dispo']}</span>";
                    echo "<div class='card_rodape'>";
                    echo "<strong><strong>Valor: </strong>R$ {$linha['valor']},00/h</strong><button class='botao_perfil'>Contratar</button>";
                    echo "</div>";
                    echo "<img src='img/hearth2.svg' class='favorito'>";
                    
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </section>

    <script>
        function pesquisar() {
            window.location.href = "pesquisar.php";
        }

        function sair() {
            window.location.href = "index.php";
        }

        function dashboard() {
            window.location.href = "dashboard.php";
        }

        function perfil() {
            window.location.href = "instrutor.php";
        }
    </script>
</body>

</html>