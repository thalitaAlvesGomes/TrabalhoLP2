<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CDTT">
    <link rel="stylesheet" href="../estilos/requisicoes/listarReq.css">
    <title>Requisições</title>
</head>


<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2 ) {

    ?>
    <header class="cabecalho">
        <nav class="menuCabecalho">
            <a class="voltar" href="../home/homePage.php">Voltar</a>
            <p class="logo">estoque.com </p>
            <a class="sair" href="../Login/logout.php">Sair</a>
        </nav>
    </header>

    <body>
        <form>
            <table campos>
                <tr class="linha">
                    <td class="coluna">
                        <p><b>Código</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Produto</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Quantidade</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Requerente</b></p>
                    </td>

                    <?php if ($_SESSION['tipoUsuario'] == 1) { ?>
                    <td class="coluna">
                        <p><b>Outras Ações</b></p>
                    </td>
                    <?php } ?>
                </tr>



                <?php
                require_once "../conexao.php";
                $sql = "SELECT * from requisicao";
                $resultado = $conexao->query($sql);
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

                foreach ($dados as $row) { //pega cada registro do array para mostrar na tela
                    ?>

                    <tr class="linha">
                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['codRequisicao'] . "</p>
                        </td>";
                            ?>


                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['produtoCod'] . "</p>
                        </td>";
                            ?>

                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['quantidade'] . "</p>
                         </td>";
                            ?>

                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['userReq'] . "</p>
                        </td>";
                            ?>
                       

                       <?php  if ($_SESSION['tipoUsuario'] == 1) { ?>
                        <td class="coluna">
                    
                        
                            &nbsp;&nbsp;&nbsp;

                           <?php
                          
                           echo "<a href='excluirRequisicao.php?codRequisicao=$row[codRequisicao]'><button class='excluir' type='button'>Excluir</button></a>";
                           }
                           ?>

                        </td>
                    </tr>

                    <?php
                }
                echo "</table></form>";

                ?>


                <form method="get" action="requerir.php">
                    <button class="novaReq" >Nova Requisição</button>
                </form>


    </body>

    <?php
}else if ($_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='../home/homePage.php'</script>";
    } else header("location: ../usuarioNaoLogado.php");
      
?>

</html>