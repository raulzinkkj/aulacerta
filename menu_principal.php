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
            align-items: center;
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

            <div class="topicos">
                <div class="topico">
                    <img src="img/house.svg" alt="">
                    <h2>Dashboard</h2>
                    </img>
                </div>

                <div class="topico">
                    <img src="img/search.svg" alt="">
                    <h2>Buscar instrutores</h2>
                    </img>
                </div>

                <div class="topico">
                    <img src="img/calendar.svg" alt="">
                    <h2>Minhas Aulas</h2>
                    </img>
                </div>

                <div class="topico">
                    <img src="img/message.svg" alt="">
                    <h2>Mensagens</h2>
                    </img>
                </div>

                <div class="topico">
                    <img src="img/hearth.svg" alt="">
                    <h2>Favoritos</h2>
                    </img>
                </div>
            </div>

            <div class="acoes">
                <div class="acao">
                    <img src="img/config.svg" alt="">
                    <h2>Configurações</h2>
                    </img>
                </div>

                <div class="acao">
                    <img src="img/sair.svg" alt="">
                    <h2>Sair</h2>
                    </img>
                </div>
            </div>
        </div>
        <div class="bemvindo">
            <div class="bemvindo2">
                <h1>Bem-vindo, Raul! 👋</h1>
                <p>Encontre o instrutor ideal para suas aulas particulares.</p>
            </div>
            <button class="botao">Buscar Instrutores</button>
        </div>

        <div class="resumo">
            <div class="card_resumo">
                <img src="" alt="">
                <div>
                    <span>Aulas Agendadas</span>
                    <strong>2</strong>
                    <a href="">Ver detalhes →</a>
                </div>
            </div>
            <div class="card_resumo">
                <img src="" alt="">
                <div>
                    <span>Instrutores Favoritos</span>
                    <strong>5</strong>
                    <a href="">Ver favoritos →</a>
                </div>
            </div>
            <div class="card_resumo">
                <img src="" alt="">
                <div>
                    <span>Mensagens</span>
                    <strong>2 não lidas</strong>
                    <a href="">Ver mensagens →</a>
                </div>
            </div>
        </div>


    </section>
</body>

</html>