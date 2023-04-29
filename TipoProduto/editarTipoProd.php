<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecadTipo.css">
    <title>Editar Categoria</title>
</head>

<header class="topo">

<nav class="menuCabecalho">
    <a class="back" href="listaTipoProd.php">Voltar</a>
    <p class="logo">estoque.com </p>
    <a class="out" href="../Login/telaLogin.php">Sair</a>
</nav>

</header>

<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1) {


if(isset($_GET['codigo'])) {
    $var_codigo = $_GET['codigo'];
    try{
       
        require_once "../conexao.php";
        $sql = "SELECT * from tipo_produto where codigo='$var_codigo'";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $row) {
           
    ?>


<div class="formulario">
            <div class="cadastro"> 
                <h2>TIPO DE PRODUTO</h2>
            </div>
            <br>
            <form name="dados" action="alterarTipoProd.php" method="post">
            <table>
                    <tr>

                        <td>
                            <div class="nomecam"><label for="codigo">Código &nbsp;</label></div>
                            <div class="alinha"><input type="text" disable name="codigo" value="<?php echo $row['codigo'];?>"> &nbsp;&nbsp;&nbsp;</div>
                        
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

} ?>





    <?php
}//fim da session tipoUsuario
?>

</html>