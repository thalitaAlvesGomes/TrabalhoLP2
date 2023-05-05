<?php

    session_start();
    if ($_SESSION['tipoUsuario'] ==1) {
        if(isset($_GET['id'])){
        $var_id = $_GET['id'];
        require_once "../conexao.php";
        try
            {   
                //vamos excluir da tabela
                $sql="delete from Usuarios 
                where id=$var_id";
                $query=$conexao->prepare($sql);
                $query->execute();
                header("location:listarUsuarios.php");
            }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("<script>alert('Erro: Este usuário não pode ser excluído, pois está associado a alguma ação dentro do sistema, por favor verifique'); window.location.href='listarUsuarios.php'</script> <code>" . $i->getMessage() .  "</code>");
        }
    }else {
        echo "<script>alert('Nenhum usuário selecionado, por favor selecione um registro válido'); window.location.href='listarUsuarios.php'</script>";
    }    
}else if ($_SESSION['tipoUsuario'] == 2 || $_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='../home/homePage.php'</script>";
    } else header("location: ../usuarioNaoLogado.php");
    
    ?>