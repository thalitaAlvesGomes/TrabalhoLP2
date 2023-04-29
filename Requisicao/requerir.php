<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleRequerir.css">
    <title>Nova Requisição</title>
</head>

<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1) {
    ?>

    <header class="topo">

        <nav class="menuCabecalho">
            <a class="back" href="listaForn.php">Voltar</a>
            <p class="logo">estoque.com </p>
            <a class="out" href="../Login/telaLogin.php">Sair</a>
        </nav>

    </header>

    <body>

        <br>
        <div class="formulario">
            <div class="cadastroFornec">
                <h2>NOVA REQUISIÇÃO</h2>
            </div>
            <br>
            <form name="dadosReq" action="novaRequisicao.php" method="post">
                <table>
                    <tr>

                        <td>
                            <div class="nomecam"><label for="produtoCod">Produto &nbsp;</label></div>
                            <div class="alinha">
                                <select name="produtoCod">
                                    <?php
                                    require_once "../conexao.php";
                                    $sql = "SELECT * from produtos order by descricao";
                                    $resultado = $conexao->query($sql);
                                    $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                                     echo "<option value='$linha[codigoProd]'> 
                                    $linha[descricao]</option>";
                                    }
                                    ?>
                                </select> &nbsp;&nbsp;&nbsp;
                            </div>
                        </td>
                        
                        <td>
                            <div class="linha">
                                <div class="nomecam"><label for="quantidade">Quantidade &nbsp; </label></div>
                                <div class="alinha"><input type="text" maxlength="18" size="20" id="quantidade" name="quantidade"
                                        required>&nbsp;&nbsp;&nbsp;</div>

                        </td>

                        
                        <td>
                            <div class="nomecam"><label for="userReq">Requerente &nbsp;</label></div>
                            <div class="alinha">
                                <select name="userReq">
                                    <?php
                                    require_once "../conexao.php";
                                    $sql = "SELECT * from usuarios order by nome";
                                    $resultado = $conexao->query($sql);
                                    $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                                     echo "<option value='$linha[id]'> 
                                    $linha[nome]</option>";
                                    }
                                    ?>
                                </select> &nbsp;&nbsp;&nbsp;
                            </div>
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