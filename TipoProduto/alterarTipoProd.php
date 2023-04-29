<?php
   
    session_start();
    if ($_SESSION['tipoUsuario'] == 1) {
        if(isset($_POST['codigo'])&&
        isset($_POST['descricao'])){

        $var_codigo = $_POST['codigo'];
        $var_descricao = $_POST['descricao'];
        require_once "../conexao.php";
        try
            {   
                $sql="update tipo_produto set 
                    descricao='$var_descricao'
                    where codigo='$var_codigo'";
                $query=$conexao->prepare($sql);
                $query->execute();
                header("location:listaTipoProd.php");
            }
        catch (PDOException $i)
        {
           
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }

    }else
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";
   
    ?>
