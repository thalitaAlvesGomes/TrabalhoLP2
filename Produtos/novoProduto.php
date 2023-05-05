<?php
    
session_start();
if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2) {
    if (
        isset($_POST['descricao']) &&
        isset($_POST['tipoProd'] ) &&
        isset($_POST['codFornecedor'] ) &&
        isset($_POST['saldo'])  &&
        isset($_POST['unidade'])
    ) {

        $var_descricao = $_POST['descricao']; 
        $var_tipoProd = $_POST['tipoProd']; 
        $var_codFornecedor = $_POST['codFornecedor']; 
        $var_saldo = $_POST['saldo'];
        $var_unidade = $_POST['unidade'];
        
        require_once "../conexao.php";
        try {   
            //inseririndo na tabela
            $sql = "insert into produtos (descricao,tipoProd,codFornecedor,saldo,unidade)
                values ('$var_descricao','$var_tipoProd',
                $var_codFornecedor,$var_saldo,'$var_unidade')";
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
        header("location: listarProdutos.php");
    }
    //fim do if
    else {
        echo "<script>alert('Por favor, preencha o formulário de Cadastro de Produtos'); window.location.href='CadProdutos.php'</script>";
           }
           
} else if ($_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='listarProdutos.php'</script>";
} else header("location: ../usuarioNaoLogado.php");

    ?>
