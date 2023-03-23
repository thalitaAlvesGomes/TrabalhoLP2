<?php

    session_start();
    if ($_SESSION['tipoUsuario'] ==1) {
        if(isset($_GET['codigo'])){
        $var_codigo = $_GET['codigo'];
        require_once "../conexao.php";
        try
            {   
                //vamos excluir da tabela
                $sql="delete from fornecedores 
                where codigo=$var_codigo";
                $query=$conexao->prepare($sql);
                $query->execute();
                header("location:listaForn.php");
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
