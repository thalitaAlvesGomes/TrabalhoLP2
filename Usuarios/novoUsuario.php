<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1) {
    if (
        isset($_POST['nome']) &&
        isset($_POST['email']) &&
        isset($_POST['username'])&&
        isset($_POST['senha'])&&
        isset($_POST['tipoUsuario'])&&
        isset($_POST['status'])
    ) {
        $var_nome = $_POST['nome'];
        $var_email = $_POST['email'];
        $var_username = $_POST['username'];
        $var_senha = $_POST['senha'];
        $var_tipoUsuario = $_POST['tipoUsuario'];
        $var_status = $_POST['status'];

        require_once "../conexao.php";
        try {
            //inserindo na tabela
            $sql = "insert into Usuarios (nome,email,username,senha,status,tipoUsuario)
                values ('$var_nome','$var_email',
                '$var_username','$var_senha',$var_status,$var_tipoUsuario)";
            $query = $conexao->prepare($sql);
            $query->execute();
            $rs = $conexao->lastInsertId()
                or die(print_r($query->errorInfo(), true));
        } catch (PDOException $i) {
            //se houver exceção, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
        header("location: listarUsuarios.php");
    }
    else {
        echo "<script>alert('Por favor, preencha o formulário de Cadastro de Usuário'); window.location.href='cadastrarUsuario.php'</script>";
    }
} else if ($_SESSION['tipoUsuario'] == 2 || $_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='../home/homePage.php'</script>";
} else header("location: ../usuarioNaoLogado.php");

?>