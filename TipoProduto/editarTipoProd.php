<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/tipoProduto/cadTipoProd.css">
    <title>Editar Categoria</title>
</head>

<header class="topo">

<nav class="menuCabecalho">
    <a class="voltar" href="listaTipoProd.php">Voltar</a>
    <p class="logo">estoque.com </p>
    <a class="sair" href="../Login/logout.php">Sair</a>
</nav>

</header>

<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2) {

//pegar o codigo do registro a ser editado
if(isset($_GET['codigo'])) {
    $var_codigo = $_GET['codigo'];
    try{
       
        require_once "../conexao.php";
        $sql = "SELECT * from tipo_produto where codigo='$var_codigo'";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $row) {
           
    ?>

            <br>
            <div class="cadastroTipoProd"> 
                <h2>TIPO DE PRODUTO</h2>
            </div>
    <div class="formulario">
            
            <br>
            <form name="dados" action="alterarTipoProd.php" method="post">
            <table>
                    <tr>

                        <td>
                            <div class="nomecam"><label for="codigo">Código &nbsp;</label></div>
                            <div class="alinha"><input type="text" name="codigo" value="<?php echo $row['codigo'];?>"> &nbsp;&nbsp;&nbsp;</div>
                        
        </td>
        <td>
                            <div class="nomecam"><label for="descricao">Descrição &nbsp;</label></div>
                            <div class="alinha"><input type="text" name="descricao" value="<?php echo $row['descricao']; ?>">&nbsp;&nbsp;&nbsp;<br></div>
                        
        </td>
        

        </tr>
        </table>
           <br>

        <input type="submit" id="confirm" value="Confirmar">


            </form>
        </div>
    
        <?php
        }//fim do foreach
    }catch(Exception $erro){
        die("Erro: <code>" . $erro->getMessage() . "</code>");
    }

    } else {
        echo "<script>alert('Nenhuma categoria selecionada, por favor selecione um registro válido'); window.location.href='listaTipoProd.php'</script>";
    }
} else if ($_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='listaTipoProd.php'</script>";
} else header("location: ../usuarioNaoLogado.php");
?>

</html>