<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1) {
    if (
        isset($_POST['produtoCod']) &&
        isset($_POST['quantidade']) &&
        isset($_POST['userReq'])
    ) {

        $var_produtoCod = $_POST['produtoCod'];
        $var_quantidade = $_POST['quantidade'];
        $var_userReq = $_POST['userReq'];

        require_once "../conexao.php";
        try {
            //inserindo na tabela
             
            $sql = "INSERT INTO requisicao (produtoCod, quantidade, userReq)  
            SELECT rp.codigoProd, $var_quantidade, $var_userReq
            FROM (
                SELECT p.codigoProd, p.saldo
                FROM produtos p
                WHERE p.saldo >= $var_quantidade
                FOR UPDATE
            ) rp
            WHERE rp.codigoProd = $var_produtoCod;
            UPDATE produtos p
            SET saldo = saldo - (
            SELECT quantidade
            FROM requisicao r
            WHERE r.produtoCod = p.codigoProd
            ORDER BY r.codRequisicao DESC
            LIMIT 1
            )
            WHERE p.codigoProd = $var_produtoCod;
            ";

            $query = $conexao->prepare($sql);
            $query->execute();
            $rs = $conexao->lastInsertId()
                or die(print_r("O produto informado não possui saldo disponível, por favor <a href='listarProdutos.php'>
            verifique</a> e tente novamente. 
            <br>
            Clique aqui para voltar a <a href='requerir.php'>
            Requisição</a> ", true));
          

        } catch (PDOException $i) {
            //se houver exceção, exibe

            die("Erro: <code>" . $i->getMessage() . "</code>");

        }
        header("location: listaRequisicao.php");
    }
    //fim do if
    else {
        echo "<p>Preencha o <a href='requerir.php'>
        Formulário</a></p>";
    }
} else
    echo "<p>Você não tem permissão para executar esta ação.
     Faça login para realizar esta ação. <a href='../Login/telaLogin.php'>Fazer Login</a></p>";

?>