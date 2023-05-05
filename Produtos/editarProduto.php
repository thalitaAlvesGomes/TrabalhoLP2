<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/produtos/cadProd.css">
    <title>Editar Produto</title>
</head>

<header class="topo">

    <nav class="menuCabecalho">
        <a class="voltar" href="listarProdutos.php">Voltar</a>
        <p class="logo">estoque.com </p>
        <a class="sair" href="../Login/logout.php">Sair</a>
    </nav>

</header>
<?php

session_start();
if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2) {
    //pegar o codigo do registro a ser editado
    if (isset($_GET['codigoProd'])) {
        $var_codigoProd = $_GET['codigoProd'];
        try {

            require_once "../conexao.php";
            $sql = "SELECT * from produtos where codigoProd=$var_codigoProd";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) {

                ?>

                <br>
                <div class="cadastroProd">
                        <h2>DADOS DO PRODUTO</h2>
                    </div>
                <div class="formulario">
                    
                    <br>
                    <form name="dadosProduto" action="atualizarProduto.php" method="post">
                        <table>
                            <tr>
                            <td>
                            <div class="nomecam"><label for="codigoProd">Código do Produto &nbsp;</label></div>
                            <div class="alinha"><input type="text" name="codigoProd" value="<?php echo $linha['codigoProd']; ?>" > &nbsp;&nbsp;&nbsp;</div>
                        
                            </td>

                                <td>
                                    <div class="nomecam"><label for="descricao">Descrição &nbsp;</label></div>
                                    <div class="alinha"><input type="text" name="descricao" value="<?php echo $linha['descricao']; ?>">
                                        &nbsp;&nbsp;&nbsp;</div>

                                </td>
                                <td>
                                    <div class="nomecam"><label for="tipoProd">Tipo do Produto &nbsp;</label></div>
                                    <div class="alinha"><select name="tipoProd">
                                            <?php
                                            $sqlTP = "SELECT * from tipo_produto order by descricao";
                                            $resultadoTP = $conexao->query($sqlTP);
                                            $dadosTP = $resultadoTP->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($dadosTP as $linhaTP) { //pega cada registro do array para mostrar na tela
                                                if ($linha['tipoProd'] == $linhaTP['codigo'])
                                                    echo "<option value='$linhaTP[codigo]' selected> 
                                                          $linhaTP[descricao]</option>";
                                                else
                                                    echo "<option value='$linhaTP[codigo]'> 
                                                          $linhaTP[descricao]</option>";

                                            }
                                            ?>
                                        </select>&nbsp;&nbsp;&nbsp;<br></div>

                                </td>
                                


                            </tr>
                        </table>
                        <br>

                        <table>
                            <tr>
                            <td>
                                    <div class="nomecam"><label for="codFornecedor">Fornecedor &nbsp;</label></div>
                                    <div class="alinha"><select name="codFornecedor">
                                            <?php
                                            $sqlFor = "SELECT * from fornecedores order by razaoSocial";
                                            $resultadoFor = $conexao->query($sqlFor);
                                            $dadosFor = $resultadoFor->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($dadosFor as $linhaFor) { //pega cada registro do array para mostrar na tela
                                                if ($linha['codFornecedor'] == $linhaFor['codigo'])
                                                    echo "<option value='$linhaFor[codigo]' selected> 
                                                          $linhaFor[razaoSocial]</option>";
                                                else
                                                    echo "<option value='$linhaFor[codigo]'> 
                                                          $linhaFor[razaoSocial]</option>";

                                            }
                                            ?>
                                        </select>&nbsp;&nbsp;&nbsp;<br></div>

                                </td>

                                <td>
                                    <div class="linha">
                                        <div class="nomecam"><label for="saldo">Saldo &nbsp; </label></div>
                                        <div class="alinha"><input type="text" name="saldo" value="<?php echo $linha['saldo']; ?>">
                                            &nbsp;&nbsp;&nbsp;</div>
                                </td>

                                <td>
                                    <div class="linha">
                                        <div class="nomecam"><label for="unidade">Unidade de Medida&nbsp; </label></div>
                                        <div class="alinha"><input type="text" name="unidade"
                                                value="<?php echo $linha['unidade']; ?>">&nbsp;&nbsp;&nbsp;</div>
                                </td>


                            </tr>
                        </table>
                        <br>

                        <input type="submit" id="confirm" value="Confirmar">


                    </form>
                </div>

                <?php
            }
        } catch (Exception $erro) {
            die("Erro: <code>" . $erro->getMessage() . "</code>");
        }
    } else {
        echo "<script>alert('Nenhum produto selecionado, por favor selecione um registro válido'); window.location.href='listarProdutos.php'</script>";
    }

}  else if ($_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='listarProdutos.php'</script>";
} else header("location: ../usuarioNaoLogado.php");

?>

</html>