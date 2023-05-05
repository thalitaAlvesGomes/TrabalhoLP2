<?php
   
    session_start();
    if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2) {
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
    }else {
        echo "<script>alert('Nenhuma categoria selecionada, por favor selecione um registro válido'); window.location.href='listaTipoProd.php'</script>";
           }

    }else if ($_SESSION['tipoUsuario'] == 3){
        echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='listaTipoProd.php'</script>";
    } else header("location: ../usuarioNaoLogado.php");
    
    ?>
