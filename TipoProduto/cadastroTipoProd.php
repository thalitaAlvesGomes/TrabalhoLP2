<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/tipoProduto/cadTipoProd.css">
    <title>Nova Categoria</title>
</head>

<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2) {
    ?>

    <header class="topo">

        <nav class="menuCabecalho">
            <a class="voltar" href="listaTipoProd.php">Voltar</a>
            <p class="logo">estoque.com </p>
            <a class="sair" href="../Login/logout.php">Sair</a>
        </nav>

    </header>

    <body>

        <br>
        <div class="cadastroTipoProd">
                <h2>INCLUIR NOVA CATEGORIA</h2>
            </div>
        <div class="formulario">
           
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
}else if ($_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='listaTipoProd.php'</script>";
} else header("location: ../usuarioNaoLogado.php");
?>

</html>