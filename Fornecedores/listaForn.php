<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CDTT">
    <link rel="stylesheet" href="../estilos/fornecedores/listarForn.css">
    <title>Fornecedores</title>
</head>


<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2 || $_SESSION['tipoUsuario'] == 3) {
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
                        <p><b>Razão Social</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>CNPJ</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Telefone</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Endereço</b></p>
                    </td>

                    <?php if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2) { ?>
                    <td class="coluna">
                        <p><b>Outras Ações</b></p>
                    </td>
                    <?php } ?>
                </tr>


                <?php
                require_once "../conexao.php";
                $sql = "SELECT * from fornecedores";
                $resultado = $conexao->query($sql);
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

                foreach ($dados as $row) {
                    ?>

                    <tr class="linha">
                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['codigo'] . "</p>
                        </td>";
                            ?>


                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['razaoSocial'] . "</p>
                        </td>";
                            ?>

                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['CNPJ'] . "</p>
                         </td>";
                            ?>

                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['telefone'] . "</p>
                        </td>";
                            ?>
                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['endereco'] . "</p>
                        </td>";
                            ?>

                        <?php if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2) { ?>

                        <td class="coluna">

                        <?php
                        echo "<a href='editarFornec.php?codigo=$row[codigo]'> <button class='editar' type='button'>Editar</button></a>";
                        }
                      ?>

                        &nbsp;&nbsp;&nbsp;
                       
                        <?php 
                        if ($_SESSION['tipoUsuario'] == 1) { 
                        echo "<a href='excluirFornec.php?codigo=$row[codigo]'><button class='excluir' type='button'>Excluir</button></a>"; 
                        }
                         ?>


                        </td>
                    </tr>

                    <?php
                }
                echo "</table></form>";

                ?>

                <?php if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2) { ?>
                <form method="get" action="CadastroFor.php">
                    <button class="novoForn">Novo Fornecedor</button>
                </form>
                <?php } ?>

    </body>
    <?php
}  else header("location: ../usuarioNaoLogado.php");
?>

    
        
</html>