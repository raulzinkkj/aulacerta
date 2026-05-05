<?php
session_start();

$pagina = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$limite = 4;
$offset = ($pagina - 1) * $limite;

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

        .buscar {
            display: flex;
            height: 80px;
            justify-content: space-between;
            align-items: center;
            grid-column: 2 / 3;
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

        .destaque {
            background: rgb(15, 98, 216);
            padding: 2px;
            border-radius: 6px;
        }

        .pagina {
            padding: 0 10px;
            height: 100vh;
        }

        .filtros {
            display: flex;
            gap: 12px;
            align-items: flex-end;
            margin-bottom: 20px;
        }

        .filtro-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .filtro-group label {
            font-size: 12px;
            font-weight: bold;
        }

        .filtro-group input,
        .filtro-group select {
            height: 36px;
            padding: 0 10px;
            border: 1px solid black;
            border-radius: 5px;
            background: white;
            font-size: 13px;
            width: 275px;
        }

        .butao {
            height: 36px;
            padding: 0 40px;
            background: #185FA5;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            margin-left: 20px;
        }

        .resultados {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .resultados span {
            font-size: 13px;
        }

        .ordem {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
        }

        .ordem select {
            height: 32px;
            padding: 0 30px;
            border: 1px solid black;
            border-radius: 3px;
            background: white;
            font-size: 13px;
        }

        .card {
            background: white;
            border: 1px solid lightgrey;
            border-radius: 12px;
            padding: 25px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .foto {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .foto img {
            height: 70px;
            width: 70px;
            border-radius: 8px;
            border: solid 1px lightgrey;
        }

        .info {
            flex: 1;
        }

        .nome {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 4px;
            flex-wrap: wrap;
        }

        .stars {
            font-size: 13px;
            color: #BA7517;
        }

        .verdinho {
            font-size: 11px;
            padding: 2px 8px;
            border-radius: 20px;
            background: #E1F5EE;
            color: #0F6E56;
            font-weight: 500;
        }

        .desc {
            font-size: 13px;
            margin-bottom: 8px;
        }

        .tags {
            display: flex;
            gap: 12px;
        }

        .tag {
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .precos {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
        }

        .preco {
            font-size: 16px;
            font-weight: 900;
        }

        .botao_perfil {
            padding: 8px 20px;
            background: #185FA5;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 13px;
            margin: 30px 0;
        }

        .cursor {
            cursor: pointer;
        }

        .paginacao {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-pag {
            width: 35px;
            height: 35px;
            padding: 0 10px;
            border-radius: 8px;
            background: white;
            border: 1px solid #dcdfe4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: #333;
            transition: 0.2s;
            text-decoration: none;
        }

        .btn-pag:hover {
            background: #185FA5;
            color: white;
            border-color: #185FA5;
        }

        .btn-pag.ativo {
            background: #185FA5;
            color: white;
            border-color: #185FA5;
            font-weight: bold;
        }

        .proxima {
            width: auto;
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
                <img src="<?php echo $usuario['foto_usuario']; ?>" alt="" class="pessoa">
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
            <div class="topicos cursor" onclick="dashboard()">
                <div class="topico">
                    <img src="img/house.svg" alt="">
                    <h2>Dashboard</h2>
                </div>
                <div class="topico destaque">
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



        <div class="pagina">
            <div class="buscar">
                <h1>Buscar Instrutores</h1>
            </div>

            <div class="filtros">
                <div class="filtro-group">
                    <label for="">Localização</label>
                    <input type="text" placeholder="São Paulo, SP">
                </div>
                <div class="filtro-group">
                    <label for="">Tipo de Câmbio</label>
                    <select>
                        <option>Todos</option>
                        <option>Manual</option>
                        <option>Automático</option>
                    </select>
                </div>
                <div class="filtro-group">
                    <label for="">Preço máximo</label>
                    <select>
                        <option>R$ 85,00/h</option>
                        <option>R$ 80,00/h</option>
                        <option>R$ 75,00/h</option>
                    </select>
                </div>
                <div class="filtro-group">
                    <label for="">Ordenar</label>
                    <select>
                        <option>Avaliação</option>
                        <option>Preço</option>
                    </select>
                </div>
                <button class="butao">Buscar</button>
            </div>

            <div class="resultados">
                <span>Encontrados alguns instrutores</span>
                
            </div>
            
            <div class="cards_instrutores">
                <?php
                //Inclui o arquivo de conexão
                include "conexao/conexao.php";

                //Conta o total de registros
                $sqlTotal = "SELECT COUNT(*) as total
                             FROM usuario AS u
                             INNER JOIN detalhes AS d ON u.id_usuario = d.id_usuario
                             WHERE u.cargo_usuario = 'Instrutor'";

                $stmtTotal = $conexao->prepare($sqlTotal);
                $stmtTotal->execute();

                $totalRegistros = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total'];
                $totalPaginas = ceil($totalRegistros / $limite);

                //Busca informações na tabela detalhes e municipios
                $instrutores = "SELECT u.id_usuario, u.nome_usuario, u.foto_usuario, u.cargo_usuario, d.descricao, d.cambio, d.estado, d.cidade, d.valor, d.dispo, m.nome_municipio 
                                FROM usuario AS u 
                                INNER JOIN detalhes AS d ON u.id_usuario = d.id_usuario 
                                INNER JOIN municipios AS m ON m.id_municipio = d.cidade
                                WHERE u.cargo_usuario = 'Instrutor' 
                                LIMIT $limite OFFSET $offset";

                $stmt = $conexao->prepare($instrutores);
                $stmt->execute();

                //Enquanto houver registros no banco ele monta os cards de visualização
                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                   echo "<div class='card'>";
                    echo "<div class='foto'>";
                        echo "<img src='{$linha['foto_usuario']}' class='foto_instrutor'>";
                    echo "</div>";
                    //Começo da div info
                    echo "<div class='info'>";
                        echo "<div class='nome'>";
                            echo "<h2>{$linha['nome_usuario']}</h2>";
                            echo "<span class='stars'>★ 4.9</span>";
                            echo "<span style='font-size:12px;'>(124 avaliações)</span>";
                            echo "<span class='verdinho'>Instrutor credenciado</span>";
                        echo "</div>";
                        echo "<p>{$linha['descricao']}</p>";
                        echo "<div class='tags'>";
                            echo "<span>{$linha['cambio']}</span>";
                            echo "<span>📍 {$linha['nome_municipio']} - {$linha['estado']}</span>";
                            echo "<span class='tag'>🕐 10 anos exp.</span>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='precos'>";
                        echo "<span class='preco'>R$ {$linha['valor']},00/h</span>";
                        echo "<form action='perfil_instrutor.php' method='get'>";
                    echo "<input type='hidden' value='{$linha['id_usuario']}' name='id'><button class='botao_perfil' onclick='perfil_instrutor()'>Ver Perfil</button>";
                    echo "</form>";
                    echo "</div>";
                   echo "</div>"; //fim da div card
                }
                ?>
            </div>
            <div class="paginacao">
                <!-- Monta a div de paginação -->
                <?php if ($pagina > 1): ?>
                    <a class="btn-pag proxima" href="?page=<?php echo $pagina - 1; ?>">◀️ Anterior</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <a class="btn-pag" href="?page=<?php echo $i; ?>"
                        style="margin: 0 5px; <?php echo ($i == $pagina) ? 'ativo' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($pagina < $totalPaginas): ?>
                    <a class="btn-pag proxima" href="?page=<?php echo $pagina + 1; ?>">Próxima ▶️</a>
                <?php endif; ?>
            </div>
        
        </div>
        </div>
    </section>
    <script>
        function dashboard() {
            window.location.href = "dashboard.php";
        }

        function sair() {
            window.location.href = "index.php";
        }
         function perfil_instrutor() {
            window.location.href = "perfil_instrutor.php";
        }
    </script>
</body>

</html>