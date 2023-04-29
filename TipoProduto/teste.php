<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1) {
        if(isset($_POST['codigo']) &&
        isset( $_POST['descricao']))
        {

        $var_codgioTP = $_POST['codigo']; 
        $var_descricaoTP = $_POST['descricao']; 

        require_once "../conexao.php";
        try
            {   
            $sql = "insert into tipo_produto (codigo, descricao)
            values ('$var_codgioTP','$var_descricaoTP')";
            $query = $conexao->prepare($sql);
            $query->execute();
            $rs = $conexao->lastInsertId()
            or die(print_r($query->errorInfo(), true));
                       
            }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
        header('location: cadastroTipoProd.php');
        
    }
    //fim do if
    else {
        echo "<h2>Preencha o <a href='cadastroTipoProd.php'>
        formulário</a></p>";
    }
}else
echo "<p>Você não tem permissão 
para executar esta ação.</p>";
    
