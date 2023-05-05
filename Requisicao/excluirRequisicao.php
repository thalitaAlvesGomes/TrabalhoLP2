<?php

    session_start();
    if ($_SESSION['tipoUsuario'] ==1) {
        if(isset($_GET['codRequisicao'])){
        $var_codRequisicao = $_GET['codRequisicao'];
        require_once "../conexao.php";
        try
            {   
                //vamos excluir da tabela
                $sql="delete from requisicao 
                where codRequisicao=$var_codRequisicao";
                $query=$conexao->prepare($sql);
                $query->execute();
                header("location:listaRequisicao.php");
            }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }else {
        echo "<script>alert('Nenhuma requisição selecionada, por favor selecione um registro válido'); window.location.href='listaRequisição.php'</script>";
    }
    
} else if ($_SESSION['tipoUsuario'] == 2){
    echo "<script>alert('Você não tem permissão para realizar este tipo de ação'); window.location.href='listaRequisicao.php'</script>";
    } else if ($_SESSION['tipoUsuario'] == 3){
        echo "<script>alert('Você não tem permissão para realizar este tipo de ação'); window.location.href='../home/homePage.php'</script>";
    } else header("location: ../usuarioNaoLogado.php");   
    ?>
