<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2 ) {
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
            $conexao->beginTransaction(); // inicia a transação
        
            $sql = "INSERT INTO requisicao (produtoCod, quantidade, userReq)  
                    SELECT rp.codigoProd, $var_quantidade, $var_userReq
                    FROM (
                        SELECT p.codigoProd, p.saldo
                        FROM produtos p
                        WHERE p.saldo >= $var_quantidade
                        FOR UPDATE
                    ) rp
                    WHERE rp.codigoProd = $var_produtoCod;
                    ";
        
            $query = $conexao->prepare($sql);
            $query->execute();
            $rowCount = $query->rowCount();
        
            if ($rowCount > 0) { // se o insert foi realizado com sucesso
                $sql = "UPDATE produtos p
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
                $rowCount = $query->rowCount();
        
                if ($rowCount > 0) { // se o update foi realizado com sucesso
                    $conexao->commit(); // finaliza a transação
                    header("location: listaRequisicao.php");
                } else {
                    $conexao->rollBack(); // desfaz a transação
                    die("<script>alert('Erro ao atualizar o saldo do produto. Tente novamente.'); window.location.href='requerir.php'</script>");
                }
            } else {
                $conexao->rollBack(); // desfaz a transação
                die("<script>alert('O produto informado não possui saldo suficiente, por favor verifique e tente novamente.'); window.location.href='listaRequisicao.php'</script>");
            }
        } catch (PDOException $i) {
            //se houver exceção, exibe
            $conexao->rollBack(); // desfaz a transação
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
        header("location: listaRequisicao.php");
    }
    //fim do if
    else {
        echo "<script>alert('Por favor, preencha o formulário de Requisição'); window.location.href='requerir.php'</script>";
    }
} else if ($_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='../home/homePage.php'</script>";
} else header("location: ../usuarioNaoLogado.php");
?>