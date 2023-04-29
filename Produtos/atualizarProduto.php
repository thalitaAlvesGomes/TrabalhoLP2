<?php
   
    session_start();
    if ($_SESSION['tipoUsuario'] == 1) {
        if(isset($_POST['codigoProd'])&&
        isset($_POST['descricao'])&&
        isset($_POST['tipoProd']) &&
        isset($_POST['codFornecedor'] ) &&
        isset($_POST['saldo'] ) &&
        isset($_POST['unidade'])){

        $var_codigoProd = $_POST['codigoProd'];
        $var_descricao = $_POST['descricao'];
        $var_tipoProd = $_POST['tipoProd']; 
        $var_codFornecedor = $_POST['codFornecedor']; 
        $var_saldo = $_POST['saldo']; 
        $var_unidade = $_POST['unidade'];
        require_once "../conexao.php";
        try
            {   
                //vamos atualizar na tabela
                $sql="update produtos set 
                    descricao='$var_descricao',
                    tipoProd='$var_tipoProd',
                    codFornecedor=$var_codFornecedor,
                    saldo=$var_saldo,
                    unidade='$var_unidade'
                    where codigoProd=$var_codigoProd";
                $query=$conexao->prepare($sql);
                $query->execute();
                header("location:listarProdutos.php");
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
