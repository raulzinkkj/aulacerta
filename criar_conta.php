
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
            font-family: sans-serif;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            background: #eef1f5;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 420px;
            padding: 40px 36px;
            border-radius: 15px;
            background: white;
            border: 1px solid #e0e4ea;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
            justify-content: center;
            display: flex;
            flex-direction: column;
        }

        .logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
        }

        .logo .loguinho {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo p {
            font-size: 13px;
            color: #888;
            margin: 0;
        }

        .linha {
            border-top: 1px solid #eee;
            padding-top: 24px;
        }

        span {
            font-size: 2rem;
            font-weight: 900;
            color: #1B4FD8;
        }

        h2 {
            font-size: 19px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 6px;
        }

        .titulo {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-bottom: 20px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px 10px 34px;
            border: 1px solid #dcdcdc;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        .lembrar {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #444;
            cursor: pointer;
            margin-bottom: 22px;
            font-weight: 400;
        }

        input[type="checkbox"] {
            width: 15px;
            height: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2563EB;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 14px;
        }
        a {
            color: #2563EB;
            text-decoration: none;
            font-size: 13px;
        }

        .pe {
            text-align: center;
            font-size: 13px;
            color: #888;
            margin: 0;
        }

        .pe a {
            font-weight: 500;
        }

        img {
            width: 60px;
            height: 60px;
        }

        
    </style>
</head>

<body>
    <form action="api/gravar_usuario.php" method="post">
        <div class="logo">
            <div class="loguinho">
                <img src="img/user.svg" alt="">
                <span>AulaCerta</span>
            </div>
            <p>Conectando alunos a instrutores particulares.</p>
        </div>

        <div class="linha">
            <div class="titulo">
                <h2>Crie a sua conta</h2>
            </div>

            <label for="email_usuario">E-mail</label>
            <input type="email" name="email_usuario" id="" placeholder="✉ seu@gmail.com">

            <label for="senha_usuario">Senha</label>
            <input type="password" name="senha_usuario" id="" placeholder="Digite sua senha">

            <label class="lembrar" for="lembrar">
                <input type="checkbox" name="lembrar" id="lembrar">
                Lembrar-me
            </label>

            <button type="submit">Criar</button>
        </div>
    </form>
</body>

</html>