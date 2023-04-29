<?php

    session_start();
    if ($_SESSION['tipoUsuario'] ==1) {
        if(isset($_GET['codigoProd'])){
        $var_codigoProd = $_GET['codigoProd'];
        require_once "../conexao.php";
        try
            {   
                //vamos excluir da tabela
                $sql="delete from   produtos 
                where codigoProd=$var_codigoProd";
                $query=$conexao->prepare($sql);
                $query->execute();
                header("location:listarProdutos.php");
            }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }
    //fim do if
    
}else
echo "<p>Você não tem permissão 
para executar esta ação.</p>";
    
    ?>