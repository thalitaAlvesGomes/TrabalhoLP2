<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CDTT">
    <link rel="stylesheet" href="listProd.css">
    <title>Lista de Produtos</title>
</head>


<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1) {

    ?>
    <header class="cabecalho">
        <nav class="menuCabecalho">
            <a class="back" href="../home/homePage.php">Voltar</a>
            <p class="logo">estoque.com </p>
            <a class="out" href="../Login/telaLogin.php">Sair</a>
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
                        <p><b>Descrição</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Tipo de Produto</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Código Fornecedor</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Saldo</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Unidade</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Outras Ações</b></p>
                    </td>
                </tr>

                <?php
                require_once "../conexao.php";
                $sql = "SELECT * from produtos";
                $resultado = $conexao->query($sql);
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

                foreach ($dados as $row) { 
                    ?>

                    <tr class="linha">
                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['codigoProd'] . "</p>
                        </td>";
                            ?>


                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['descricao'] . "</p>
                        </td>";
                            ?>

                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['tipoProd'] . "</p>
                         </td>";
                            ?>

                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['codFornecedor'] . "</p>
                         </td>";
                            ?>

                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['saldo'] . "</p>
                        </td>";
                            ?>
                        
                        <td class="coluna">
                        <?php
                            echo "<p>" . $row['unidade'] . "</p>
                        </td>";
                            ?>
                       <td class="coluna">
                        <?php echo "<a href='editarProduto.php?codigoProd=$row[codigoProd]'><button class='editar' type='button'>Editar</button></a>";?>

                        &nbsp;&nbsp;&nbsp;

                           <?php echo "<a href='excluirProduto.php?codigoProd=$row[codigoProd]'><button class='excluir' type='button'>Excluir</button></a>";?>


                        </td>
                    </tr>

                    <?php
                }
                echo "</table></form>";

                ?>


                <form method="get" action="CadProdutos.php">
                    <button class="new" >Novo Produto</button>
                </form>


    </body>

    <?php
} 

?>

</html>