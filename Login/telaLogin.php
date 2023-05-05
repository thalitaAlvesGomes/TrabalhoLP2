<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CDTT">
    <link rel="stylesheet" href="style.css">
    <title>estoque.com</title>
</head>

<body>
    <header class="header">
        <nav>
            <a class="logo" href="../LandingPage/index.php">estoque.com</a>
        </nav>
    </header>

    <div class="mainLogin">
        <div class="login">
            <h1>Login</h1>
            <form name="dados" method="post" action="../Login/validarLogin.php">
                <div class="user">
                    <label for="username">Usuário</label>
                    <input type="text" name="username" id="usuario" placeholder="Usuário" size="25" required>
                </div>
                <br>
                <div class="user">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Senha" size="25" required>
                </div>
                <br>
                <input class="loginButton" type="submit" value="Entrar">
            </form>

                

        </div>
        <br>

    </div>
</body>

</html>