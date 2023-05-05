<?php
   
    session_start();
    if ($_SESSION['tipoUsuario'] == 1) {
        if (
            isset($_POST['id'])&&
            isset($_POST['nome']) &&
            isset($_POST['email']) &&
            isset($_POST['username'])&&
            isset($_POST['senha'])&&
            isset($_POST['tipoUsuario'])&&
            isset($_POST['status'])
        ) {
            $var_id= $_POST['id'];
            $var_nome = $_POST['nome'];
            $var_email = $_POST['email'];
            $var_username = $_POST['username'];
            $var_senha = $_POST['senha'];
            $var_tipoUsuario = $_POST['tipoUsuario'];
            $var_status = $_POST['status'];
        require_once "../conexao.php";
        try
            {   
                //vamos atualizar na tabela
                $sql="update usuarios set
                    nome='$var_nome', 
                    email='$var_email',
                    senha='$var_senha',
                    tipoUsuario=$var_tipoUsuario,
                    status=$var_status
                    where id=$var_id";
                $query=$conexao->prepare($sql);
                $query->execute();
                header("location:listarUsuarios.php");
            }
        catch (PDOException $i)
        {
           
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
    } else {
        echo "<script>alert('Nenhum usuário selecionado, por favor selecione um registro válido'); window.location.href='listarUsuarios.php'</script>";
           }

    }else if ($_SESSION['tipoUsuario'] == 2 || $_SESSION['tipoUsuario'] == 3){
        echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='../home/homePage.php'</script>";
    } else header("location: ../usuarioNaoLogado.php");
   
    ?>
