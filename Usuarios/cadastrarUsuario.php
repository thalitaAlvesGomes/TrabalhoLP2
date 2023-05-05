<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/usuarios/cadUsuarios.css">
    <title>Cadastro de Usuários</title>
</head>

<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1) {
?>

    <header class="topo">

        <nav class="menuCabecalho">
            <a class="voltar" href="listarUsuarios.php">Voltar</a>
            <p class="logo">estoque.com </p>
            <a class="sair" href="../Login/logout.php">Sair</a>
        </nav>

    </header>

    <body>

        <br>
                <div class="cadastroUsuario">
                        <h2>DADOS DO USUÁRIO</h2>
                    </div>
        <div class="formulario">

            <br>
            <form name="dadosUsua" action="novoUsuario.php" method="post">
                <table>
                    <tr>

                        <td>
                            <div class="nomecam"><label for="nome">Nome &nbsp;</label></div>
                            <div class="alinha"><input type="text" maxlength="100" size="60" id="nome" name="nome" required>&nbsp;&nbsp;&nbsp;<br></div>
                        </td>

                        <td>
                            <div class="linha">
                                <div class="nomecam"><label for="email">E-mail &nbsp; </label></div>
                                <div class="alinha"><input type="text" maxlength="80" size="40" id="email" name="email" required>&nbsp;&nbsp;&nbsp;</div>

                        </td>

                    </tr>
                </table>
                <br>

                <table>
                    <tr>
                       

                        <td>
                            <div class="linha">
                                <div class="nomecam"><label for="username">Usuário &nbsp; </label></div>
                                <div class="alinha"><input type="text" maxlength="20" size="25" id="username" name="username" required>
                                    &nbsp;&nbsp;&nbsp;</div>
                        </td>

                        <td>
                            <div class="linha">
                                <div class="nomecam"><label for="senha">Senha &nbsp; </label></div>
                                <div class="alinha"><input type="text" maxlength="100" size="28" id="senha" name="senha" required>&nbsp;&nbsp;&nbsp;</div>
                        </td>
                        <td>
                            <div class="linha">
                                <div class="nomecam"><label for="tipoUsuario">Tipo Usuário &nbsp; </label></div>
                                <div class="alinha">
                                <select name="tipoUsuario">
                                    <option value="1">Administrador</option>
                                    <option value="2">Gerente</option>
                                    <option value="3">Operador</option>
                                </select>
                               &nbsp;&nbsp;&nbsp;</div>
                        </td>
                        <td>
                            <div class="linha">
                                <div class="nomecam"><label for="status"> Status &nbsp; </label></div>
                                <div class="alinha"> 
                                <select name="status">
                                    <option value="1">Ativo</option>
                                    <option value="2">Inativo</option>
                                </select>&nbsp;&nbsp;&nbsp;</div>
                        </td>

                    </tr>
                </table>
                <br>





                <input type="submit" id="confirm" value="Confirmar">


            </form>

        </div>

    </body>

<?php
}else if ($_SESSION['tipoUsuario'] == 2 || $_SESSION['tipoUsuario'] == 3) {
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='../home/homePage.php'</script>";
} else header("location: ../usuarioNaoLogado.php");
?>

</html>