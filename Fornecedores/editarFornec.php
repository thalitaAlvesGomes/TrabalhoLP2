<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilocad.css">
    <title>Cadastro de Fornecedores</title>
</head>

<header class="topo">

<nav class="menuCabecalho">
    <a class="back" href="listaForn.php">Voltar</a>
    <p class="logo">estoque.com </p>
    <a class="out" href="../Login/telaLogin.php">Sair</a>
</nav>

</header>

<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1) {

//pegar o id do fornecedor a ser editado
if(isset($_GET['codigo'])) {
    $var_codigo = $_GET['codigo'];
    try{
        //selecionar o id a ser editado
        require_once "../conexao.php";
        $sql = "SELECT * from fornecedores where codigo=$var_codigo";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $row) {
            //mostrar na tela os dados do fornecedor registrado
    ?>


<div class="formulario">
            <div class="cadastroFornec"> 
                <h2>DADOS DO FORNECEDOR</h2>
            </div>
            <br>
            <form name="dadosFornec" action="alterarFornec.php" method="post">
            <table>
                    <tr>

                        <td>
                            <div class="nomecam"><label for="codigo">Código &nbsp;</label></div>
                            <div class="alinha"><input type="text" name="codigo" value="<?php echo $row['codigo']; ?>"> &nbsp;&nbsp;&nbsp;</div>
                        
        </td>
        <td>
                            <div class="nomecam"><label for="razaoSocial">Razão Social &nbsp;</label></div>
                            <div class="alinha"><input type="text" name="razaoSocial" value="<?php echo $row['razaoSocial']; ?>">&nbsp;&nbsp;&nbsp;<br></div>
                        
        </td>
        

        </tr>
        </table>
        <br>

        <table>
            <tr>
                <td>
                    <div class="linha">
                        <div class="nomecam"><label for="cnpj">CNPJ &nbsp; </label></div>
                        <div class="alinha"><input type="text" name="cnpj" value="<?php echo $row['CNPJ']; ?>">&nbsp;&nbsp;&nbsp;</div>

                </td>

                <td>
                    <div class="linha">
                        <div class="nomecam"><label for="telefone">Telefone &nbsp; </label></div>
                        <div class="alinha"><input type="text" name="telefone" value="<?php echo $row['telefone']; ?>"> &nbsp;&nbsp;&nbsp;</div>
                </td>

                <td>
                    <div class="linha">
                        <div class="nomecam"><label for="endereco">Endereço&nbsp; </label></div>
                        <div class="alinha"><input type="text" name="endereco" value="<?php echo $row['endereco']; ?>">&nbsp;&nbsp;&nbsp;</div>
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