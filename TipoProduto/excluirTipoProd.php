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
            die("Erro: Tipo de Produto não pode ser excluído pois está relacinado em algum cadastro de produto ou verifique <code>" . $i->getMessage() .  "</code>");
        }
    }
    //fim do if
    
}else
echo "<p>Você não tem permissão 
para executar esta ação.</p>";
    
    ?>
