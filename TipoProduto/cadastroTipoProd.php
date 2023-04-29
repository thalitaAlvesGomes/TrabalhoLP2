<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCadTipo.css">
    <title>Nova Categoria</title>
</head>

<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1) {
    ?>

    <header class="topo">

        <nav class="menuCabecalho">
            <a class="back" href="listaTipoProd.php">Voltar</a>
            <p class="logo">estoque.com </p>
            <a class="out" href="../Login/telaLogin.php">Sair</a>
        </nav>

    </header>

    <body>

        <br>
        <div class="formulario">
            <div class="cadastroTipoProd">
                <h2>Incluir Nova Categoria</h2>
            </div>
            <br>
            <form name="dadosFornec" action="novoTipoProd.php" method="post">
                <table>
                    <tr>

                        <td>
                            <div class="nomecam"><label for="codigo">Código &nbsp;</label></div>
                            <div class="alinha"><input type="text" maxlength="10" size="20" id="codigo" name="codigo" placeholder="PA"
                                    required>&nbsp;&nbsp;&nbsp;<br></div>
                                    </td>

                      <td>
                            <div class="linha">
                            <div class="nomecam"><label for="descricao">Descrição &nbsp; </label></div>
                            <div class="alinha"><input type="text" size="20" id="descricao" name="descricao"
                            required>&nbsp;&nbsp;&nbsp;</div>

                             </td>

        

       
        </tr>
        </table>
        <br>

        <input type="submit" id="confirm" value="Confirmar">


        </form>

        </div>

    </body>
    
    <?php
}
?>

</html>