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
                <img src="img/raul.jpeg" alt="" class="pessoa">
                <div class="descricao">
                    <strong>Raul Karvat</strong>
                    <span>Aluno</span>
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
                    <img src="img/house.svg" alt="" >
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
                    <input type="text" value="São Paulo, SP">
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
                <button class="butao">Buscar</button>
            </div>

            <div class="resultados">
                <span>Encontrados 24 instrutores</span>
                <div class="ordem">
                    <span>Ordenar por:</span>
                    <select>
                        <option>Avaliação</option>
                        <option>Preço</option>
                    </select>
                </div>
            </div>

            <div class="card">
                <div class="foto">
                    <img src="img/carlos.jpg" alt="">
                </div>
                <div class="info">
                    <div class="nome">
                        <h2>Carlos Mendes</h2>
                        <span class="stars">★ 4.9</span>
                        <span style="font-size:12px;">(124 avaliações)</span>
                        <span class="verdinho">Instrutor credenciado</span>
                    </div>
                    <p class="desc">Instrutor com 10 anos de experiência. Especialista em primeira habilitação e direção defensiva.
                    </p>
                    <div class="tags">
                        <span class="tag">⚙ Manual e Automático</span>
                        <span class="tag">📍 Zona Sul – SP</span>
                        <span class="tag">🕐 10 anos exp.</span>
                    </div>
                </div>
                <div class="precos">
                    <span class="preco">R$ 80,00/h</span>
                    <button class="botao_perfil">Ver Perfil</button>
                </div>
            </div>

            <div class="card">
                <div class="foto">
                    <img src="img/ana.jpg" alt="">
                </div>
                <div class="info">
                    <div class="nome">
                        <h2>Ana Paula Silva</h2>
                        <span class="stars">★ 4.8</span>
                        <span style="font-size:12px;">(96 avaliações)</span>
                        <span class="verdinho">Instrutora credenciada</span>
                    </div>
                    <p class="desc">Paciência e didática especializada para alunos iniciantes. Foco em confiança ao dirigir.</p>
                    <div class="tags">
                        <span class="tag">⚙ Automático</span>
                        <span class="tag">📍 Centro – SP</span>
                        <span class="tag">🕐 8 anos exp.</span>
                    </div>
                </div>
                <div class="precos">
                    <span class="preco">R$ 75,00/h</span>
                    <button class="botao_perfil">Ver Perfil</button>
                </div>
            </div>

            <div class="card">
                <div class="foto">
                    <img src="img/roberto.jpg" alt="">
                </div>
                <div class="info">
                    <div class="nome">
                        <h2>Roberto Costa</h2>
                        <span class="stars">★ 4.9</span>
                        <span style="font-size:12px;">(156 avaliações)</span>
                        <span class="verdinho">Instrutor credenciado</span>
                    </div>
                    <p class="desc">Especialista em reciclagem para habilitados e aperfeiçoamento. 15 anos de experiência.</p>
                    <div class="tags">
                        <span class="tag">⚙ Manual e Automático</span>
                        <span class="tag">📍 Zona Oeste – SP</span>
                        <span class="tag">🕐 15 anos exp.</span>
                    </div>
                </div>
                <div class="precos">
                    <span class="preco">R$ 85,00/h</span>
                    <button class="botao_perfil">Ver Perfil</button>
                </div>
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
    </script>
</body>

</html>