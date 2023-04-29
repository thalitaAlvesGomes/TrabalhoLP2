<?php
    session_start();
    if ($_SESSION['tipoUsuario'] == 1) {
        if(isset($_POST['codigo'])&&
        isset($_POST['razaoSocial']) &&
        isset( $_POST['cnpj']) &&
        isset($_POST['telefone'] ) &&
        isset($_POST['endereco'] )){

        $var_codigo = $_POST['codigo'];
        $var_razao = $_POST['razaoSocial']; 
        $var_cnpj = $_POST['cnpj']; 
        $var_telefone = $_POST['telefone']; 
        $var_endereco = $_POST['endereco']; 
        require_once "../conexao.php";
        try
            {   
               
                $sql="update fornecedores set 
                    razaoSocial ='$var_razao',
                    CNPJ ='$var_cnpj',
                    telefone ='$var_telefone',
                    endereco ='$var_endereco'
                    where codigo =$var_codigo";
                $query=$conexao->prepare($sql);
                $query->execute();
                header("location:listaForn.php");
            }
        catch (PDOException $i)
        {
           
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }
    
    }
    ?>
