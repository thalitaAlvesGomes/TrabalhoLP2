<?php

    session_start();
    if ($_SESSION['tipoUsuario'] ==1) {
        if(isset($_GET['codigo'])){
        $var_codigoTP = $_GET['codigo'];
        require_once "../conexao.php";
        try
            {   
                //vamos excluir da tabela
                $sql="delete from tipo_produto 
                where codigo='$var_codigoTP'";
                $query=$conexao->prepare($sql);
                $query->execute();
                header("location:listaTipoProd.php");
            }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("<script>alert('Erro: Essa categoria não pode ser excluída pois está relacinada em algum cadastro de produto, por favor verifique'); window.location.href='listaTipoProd.php'</script> <code>" . $i->getMessage() .  "</code>");
        }
    } else {
        echo "<script>alert('Nenhuma categoria selecionada, por favor selecione um registro válido'); window.location.href='listaTipoProd.php'</script>";
    }
        
} else if ($_SESSION['tipoUsuario'] == 2 || $_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='listaTipoProd.php'</script>";
    } else header("location: ../usuarioNaoLogado.php");
    
    ?>
