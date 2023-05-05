<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2 ) {
    if (
        isset($_POST['razaoSocial']) &&
        isset($_POST['cnpj']) &&
        isset($_POST['telefone']) &&
        isset($_POST['endereco'])
    ) {

        $var_razaoSocial = $_POST['razaoSocial'];
        $var_cnpj = $_POST['cnpj'];
        $var_telefone = $_POST['telefone'];
        $var_endereco = $_POST['endereco'];

        require_once "../conexao.php";
        try {
            //inserindo na tabela
            $sql = "insert into fornecedores (razaoSocial,CNPJ,telefone,endereco)
                values ('$var_razaoSocial','$var_cnpj','$var_telefone',
                '$var_endereco')";
            $query = $conexao->prepare($sql);
            $query->execute();
            $rs = $conexao->lastInsertId()
                or die(print_r($query->errorInfo(), true));
            echo "<p>Salvo com sucesso!</p>";
        } catch (PDOException $i) {
            //se houver exceção, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
        header("location: listaForn.php");
    } else {
        echo "<script>alert('Por favor, preencha o formulário de Cadastro de Fornecedor'); window.location.href='CadastroFor.php'</script>";
    } 
} else if ($_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='listaForn.php'</script>";
} else header("location: ../usuarioNaoLogado.php");

    ?>