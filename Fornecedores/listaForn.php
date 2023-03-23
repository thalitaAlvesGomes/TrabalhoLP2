<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CDTT">
    <link rel="stylesheet" href="style.css">
    <title>Lista de Fornecedores</title>
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
                    <td class="coluna">
                        <p><b>Outras Ações</b></p>
                    </td>

                </tr>




                <?php
                require_once "../conexao.php";
                $sql = "SELECT * from fornecedores";
                $resultado = $conexao->query($sql);
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

                foreach ($dados as $row) { //pega cada registro do array para mostrar na tela
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

                        <td class="coluna">
                    
                        <?php echo "<a href='editarFornec.php?codigo=$row[codigo]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                      </svg></a>";?>

                        &nbsp;&nbsp;&nbsp;

                           <?php echo "<a href='excluirFornec.php?codigo=$row[codigo]'>
                           <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                           <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                           <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                         </svg></a>";?>


                        </td>
                    </tr>

                    <?php
                }
                echo "</table></form>";

                ?>


                <form method="get" action="CadastroFor.php">
                    <button class="newForn" >Novo Fornecedor</button>
                </form>


    </body>

    <?php
} // fim do if

?>

</html>