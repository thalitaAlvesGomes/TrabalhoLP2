<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/fornecedores/cadForn.css">
    <title>Cadastro de Fornecedores</title>
</head>

<?php
session_start();
if ($_SESSION['tipoUsuario'] == 1 || $_SESSION['tipoUsuario'] == 2) {
    ?>

    <header class="topo">

        <nav class="menuCabecalho">
            <a class="voltar" href="listaForn.php">Voltar</a>
            <p class="logo">estoque.com </p>
            <a class="sair" href="../Login/logout.php">Sair</a>
        </nav>

    </header>

    <body>
    <br>
    <div class="cadastroFornec">
                <h2>DADOS DO FORNECEDOR</h2>
            </div>

       
        <div class="formulario">
            
            <br>
            <form name="dadosFornec" action="novoFornecedor.php" method="post">
                <table>
                    <tr>

                        <td>
                            <div class="nomecam"><label for="razaoSocial">Razão Social &nbsp;</label></div>
                            <div class="alinha"><input type="text" maxlength="100" size="88" id="razaoSocial" name="razaoSocial" required><br>
                            </div>
                        </td>
        

       
                    </tr>
              </table>
              <br>

        <table>
            <tr>
                <td>
                    <div class="linha">
                        <div class="nomecam"><label for="cnpj">CNPJ &nbsp; </label></div>
                        <div class="alinha"><input type="text" maxlength="18" size="18" id="cnpj" name="cnpj"
                                placeholder="xx.xxx.xxx/xxxx-xx" required>&nbsp;&nbsp;&nbsp;</div>

                </td>

                <td>
                    <div class="linha">
                        <div class="nomecam"><label for="telefone">Telefone &nbsp; </label></div>
                        <div class="alinha"><input type="text" maxlength="20" size="18" id="telefone" name="telefone"
                                placeholder="(xx)xxxxx-xxxx" required>
                            &nbsp;&nbsp;&nbsp;</div>
                </td>

                <td>
                    <div class="linha">
                        <div class="nomecam"><label for="endereco">Endereço &nbsp; </label></div>
                        <div class="alinha"><input type="text" maxlength="100" size="42" id="endereco" name="endereco"
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
}else if ($_SESSION['tipoUsuario'] == 3){
    echo "<script>alert('Você não tem permissão para acessar esta página'); window.location.href='listaForn.php'</script>";
} else header("location: ../usuarioNaoLogado.php");
?>

</html>