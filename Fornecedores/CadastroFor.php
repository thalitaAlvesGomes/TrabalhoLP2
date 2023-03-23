<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilocad.css">
    <title>Cadastro de Fornecedores</title>
</head>

<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1) {
    ?>

    <header class="topo">

        <nav class="menuCabecalho">
            <a class="back" href="listaForn.php">Voltar</a>
            <p class="logo">estoque.com </p>
            <a class="out" href="../Login/telaLogin.php">Sair</a>
        </nav>

    </header>

    <body>

        <br>
        <div class="formulario">
            <div class="cadastroFornec">
                <h2>DADOS DO FORNECEDOR</h2>
            </div>
            <br>
            <form name="dadosFornec" action="novoFornecedor.php" method="post">
                <table>
                    <tr>

                        <td>
                            <div class="nomecam"><label for="razaoSocial">Razão Social &nbsp;</label></div>
                            <div class="alinha"><input type="text" maxlength="100" size="90" id="razaoSocial" name="razaoSocial"
                                    required><br></div>
                                    </td>
        

       
        </tr>
        </table>
        <br>

        <table>
            <tr>
                <td>
                    <div class="linha">
                        <div class="nomecam"><label for="cnpj">CNPJ &nbsp; </label></div>
                        <div class="alinha"><input type="text" maxlength="18" size="20" id="cnpj" name="cnpj"
                                placeholder="xx.xxx.xxx/xxxx-xx" required>&nbsp;&nbsp;&nbsp;</div>

                </td>

                <td>
                    <div class="linha">
                        <div class="nomecam"><label for="telefone">Telefone &nbsp; </label></div>
                        <div class="alinha"><input type="text" maxlength="20" size="20" id="telefone" name="telefone"
                                placeholder="(xx)xxxxx-xxxx" required>
                            &nbsp;&nbsp;&nbsp;</div>
                </td>

                <td>
                    <div class="linha">
                        <div class="nomecam"><label for="endereco">Endereço &nbsp; </label></div>
                        <div class="alinha"><input type="text" maxlength="100" size="54" id="endereco" name="endereco"
                                required>&nbsp;&nbsp;&nbsp;</div>
                </td>


            </tr>
        </table>
        <br>





        <input type="submit" id="confirm" value="Confirmar">


        </form>

        </div>

    </body>
    
    <?php
}
?>

</html>