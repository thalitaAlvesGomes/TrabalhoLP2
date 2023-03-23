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
    foreach ($dados as $linha) {
        //se existir, mensagem Ok
        //echo "Acesso verificado.";
        $_SESSION['usuarioLogado'] = true;
        $_SESSION['idUsuario'] = $linha['id'];
        $_SESSION['nomeUsuario'] = $linha['nome'];
        $_SESSION['tipoUsuario'] = $linha['tipoUsuario'];
        header("location:../home/homePage.php");
    }


} else {
    echo "não deu certo...";
}

?>