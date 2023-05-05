<?php
    session_start();
    if ($_SESSION['tipoUsuario'] ==1) {
        if(isset($_GET['codigo'])){
        $var_codigo = $_GET['codigo'];
        require_once "../conexao.php";
        try
            {   
                //excluir da tabela
                $sql="delete from fornecedores 
                where codigo=$var_codigo";
                $query=$conexao->prepare($sql);
                $query->execute();
                header("location:listaForn.php");
            }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("<script>alert('Erro: Esse fornecedor não pode ser excluído pois está relacinado em um cadastro de produto, por favor verifique'); window.location.href='listaForn.php'</script> <code>" . $i->getMessage() .  "</code>");
        }
    } else {
        echo "<script>alert('Nenhum fornecedor selecionado, por favor selecione um registro válido'); window.location.href='listaForn.php'</script>";
    }
        
}else if ($_SESSION['tipoUsuario'] == 2 || $_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='listaForn.php'</script>";
    } else header("location: ../usuarioNaoLogado.php");
    
    
    ?>
