<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/usuarios/cadUsuarios.css">
    <title>Editar Usuário</title>
</head>

<header class="topo">

    <nav class="menuCabecalho">
        <a class="voltar" href="listarUsuarios.php">Voltar</a>
        <p class="logo">estoque.com </p>
        <a class="sair" href="../Login/logout.php">Sair</a>
    </nav>

</header>
<?php

session_start();
if ($_SESSION['tipoUsuario'] == 1) {
    //pegar o idcodigo do registro a ser editado
    if (isset($_GET['id'])) {
        $var_id = $_GET['id'];
        try {

            require_once "../conexao.php";
            $sql = "SELECT * from Usuarios where id=$var_id";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) {

                ?>
                <br>
                <div class="cadastroUsuario">
                        <h2>DADOS DO USUÁRIO</h2>
                    </div>
                <div class="formulario">
                    
                    <br>
                    <form name="dadosUsuarios" action="atualizarUsuarios.php" method="post">
                        <table>
                            <tr>
                            <td>
                            <div class="nomecam"><label for="id">Id &nbsp;</label></div>
                            <div class="alinha"><input type="text" size="3" name="id" value="<?php echo $linha['id']; ?>"> &nbsp;&nbsp;&nbsp;</div>
                        
                            </td>
                            <td>
                            <div class="nomecam"><label for="nome">Nome &nbsp;</label></div>
                            <div class="alinha"><input type="text" size="35" name="nome" value="<?php echo $linha['nome']; ?>"> &nbsp;&nbsp;&nbsp;</div>
                        
                            </td>

                                <td>
                                    <div class="nomecam"><label for="email">E-mail &nbsp;</label></div>
                                    <div class="alinha"><input type="text" size="42" name="email" value="<?php echo $linha['email']; ?>">
                                        &nbsp;&nbsp;&nbsp;</div>

                                </td>
                        
                            </tr>
                        </table>
                        <br>

                        <table>
                            <tr>        
                                <td>
                                    <div class="nomecam"><label for="username">Usuário &nbsp;</label></div>
                                    <div class="alinha"><input type="text" name="username" value="<?php echo $linha['username']; ?>">
                                        &nbsp;&nbsp;&nbsp;</div>
                                </td>
                                
                            <td>
                                    <div class="linha">
                                        <div class="nomecam"><label for="senha">Senha &nbsp; </label></div>
                                        <div class="alinha"><input type="text" name="senha" value="<?php echo $linha['senha']; ?>">
                                            &nbsp;&nbsp;&nbsp;</div>
                                </td>
                                <td>
                                    <div class="linha">
                                        <div class="nomecam"><label for="tipoUsuario">Tipo Usuário &nbsp; </label></div>
                                        <div class="alinha">
                                        <select name="tipoUsuario">
                                            <option value="<?php echo $linha['tipoUsuario']; ?>"><?php
                                            if($linha['tipoUsuario'] == 1){
                                                echo"Administrador";
                                            }else if($linha['tipoUsuario'] == 2){
                                                echo"Gerente";
                                            }else if($linha['tipoUsuario'] == 3){
                                                echo"Operador";
                                            }
                                            ?></option>
                                            <option value="1";>Administrador</option>
                                            <option value="2";>Gerente</option>
                                            <option value="3";>Operador</option>
                                        </select>     
                                         &nbsp;&nbsp;&nbsp;</div>
                                </td>

                                <td>
                                    <div class="linha">
                                        <div class="nomecam"><label for="status">Status &nbsp; </label></div>
                                        <div class="alinha">
                                        <select name="status">
                                            <option value="<?php echo $linha['status']; ?>"><?php
                                            if($linha['status'] == 1){
                                                echo"Ativo";
                                            }else{
                                                echo"Inativo";
                                            }
                                            ?></option>
                                            <option value="<?php 
                                            if ($linha['status'] == 1){
                                                echo"2";
                                            }else{
                                                echo"1";
                                            }
                                            ?>"><?php
                                            if($linha['status'] == 1){
                                                echo"Inativo";
                                            }else{
                                                echo"Ativo";
                                            }
                                            ?></option>
                                        </select>       
                                        &nbsp;&nbsp;&nbsp;</div>
                                </td>


                            </tr>
                        </table>
                        <br>

                        <input type="submit" id="confirm" value="Confirmar">


                    </form>
                </div>

                <?php
            }
        } catch (Exception $erro) {
            die("Erro: <code>" . $erro->getMessage() . "</code>");
        }
    } else {
        echo "<script>alert('Nenhum usuário selecionado, por favor selecione um registro válido'); window.location.href='listarUsuarios.php'</script>";
    }
} else if ($_SESSION['tipoUsuario'] == 2 || $_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='../home/homePage.php'</script>";
} else header("location: ../usuarioNaoLogado.php");

?>

</html>