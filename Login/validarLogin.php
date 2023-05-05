<?php

session_start();
require_once("../conexao.php");

//verificando se digitou usuario e senha
if (isset($_POST['username']) && isset($_POST['senha'])) {
    $varUsername = $_POST['username'];
    $varSenha = $_POST['senha'];
    //verificando se existe no banco de dados
    $sql = "SELECT * FROM usuarios
    where username='$varUsername' and senha='$varSenha'";
    //require_once("/trabalhoLP2/conexao.php");
    $resultado = $conexao->query($sql);
    $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);

    if (empty($dados)) {
        // se o array de dados estiver vazio, exibe um alerta
        echo "<script>alert('Usuário ou senha incorretos. Tente novamente.'); window.location.href='telaLogin.php'</script>";
    } else {

    foreach ($dados as $linha) {

        $_SESSION['usuarioLogado'] = true;
        $_SESSION['idUsuario'] = $linha['id'];
        $_SESSION['nomeUsuario'] = $linha['nome'];
        $_SESSION['tipoUsuario'] = $linha['tipoUsuario'];
        $_SESSION['statusUsuario'] = $linha['status'];
        header("location:../home/homePage.php");
    }
} 

}

?>