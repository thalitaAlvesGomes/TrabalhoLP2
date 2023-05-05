<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="CDTT">
    <link rel="stylesheet" href="../estilos/usuarios/listarUsuarios.css">
    <title>Usuários</title>
</head>


<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1) {

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
                        <p><b>Id</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Nome</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Email</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Username</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Senha</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Status</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>tipoUsuario</b></p>
                    </td>
                    <td class="coluna">
                        <p><b>Outras Ações</b></p>
                    </td>
                </tr>

                <?php
                require_once "../conexao.php";
                $sql = "SELECT * from Usuarios";
                $resultado = $conexao->query($sql);
                $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

                foreach ($dados as $row) { 
                    ?>

                    <tr class="linha">
                    <td class="coluna">
                            <?php
                            echo "<p>" . $row['id'] . "</p>
                        </td>";
                            ?>

                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['nome'] . "</p>
                        </td>";
                            ?>


                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['email'] . "</p>
                        </td>";
                            ?>

                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['username'] . "</p>
                         </td>";
                            ?>

                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['senha'] . "</p>
                         </td>";
                            ?>

                        <td class="coluna">
                            <?php
                            echo "<p>" . $row['status'] . "</p>
                        </td>";
                            ?>
                        
                        <td class="coluna">
                        <?php
                            echo "<p>" . $row['tipoUsuario'] . "</p>
                        </td>";
                            ?>
                        
                        <td class="coluna">
                    
                    <?php echo "<a href='editarUsuario.php?id=$row[id]'><button class='editar' type='button'>Editar</button></a>";?>

                    &nbsp;&nbsp;&nbsp;

                       <?php echo "<a href='excluirUsuario.php?id=$row[id]'><button class='excluir' type='button'>Excluir</button></a>";?>


                    </td>
                    </tr>

                    <?php
                }

                echo "</table></form>";

                ?>


                <form method="get" action="cadastrarUsuario.php">
                    <button class="novoUsuario" >Novo Usuário</button>
                </form>


    </body>

    <?php
} else if ($_SESSION['tipoUsuario'] == 2 || $_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='../home/homePage.php'</script>";
    } else header("location: ../usuarioNaoLogado.php");
 
?>

</html>