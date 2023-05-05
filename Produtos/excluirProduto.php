<?php
    session_start();
    if ($_SESSION['tipoUsuario'] ==1) { 
        if(isset($_GET['codigoProd'])){
        $var_codigoProd = $_GET['codigoProd'];
        require_once "../conexao.php";
        try
            {   
                //excluir da tabela
                $sql="delete from  produtos 
                where codigoProd=$var_codigoProd";
                $query=$conexao->prepare($sql);
                $query->execute();
                header("location:listarProdutos.php");
            }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("<script>alert('Erro: Este produto não pode ser excluído, pois pode estar relacionado a alguma requisição, por favor verifique'); window.location.href='listarProdutos.php'</script> <code>" . $i->getMessage() .  "</code>");
        }
    } else {
        echo "<script>alert('Nenhum produto selecionado, por favor selecione um registro válido'); window.location.href='listarProdutos.php'</script>";
    }
    
} else if ($_SESSION['tipoUsuario'] == 2 || $_SESSION['tipoUsuario'] == 3){
echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='listarProdutos.php'</script>";
} else header("location: ../usuarioNaoLogado.php");
    
    ?>