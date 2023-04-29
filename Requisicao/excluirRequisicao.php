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
    }
    //fim do if
    
}else
echo "<p>Você não tem permissão 
para executar esta ação.</p>";
    
    ?>
