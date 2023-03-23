<!DOCTYPE html>
<html lang="pt=br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Produtos</title>
</head>
<?php
    session_start();
    if ($_SESSION['tipoUsuario'] == 1) {
?>
<header class="cabecalho">

    <nav class="menuCabecalho">
        <a class="back" href="../home/homePage.php">Voltar</a>
        <p class="logo">estoque.com </p>
        <a class="out" href="../Login/telaLogin.php">Sair</a>
    </nav>

</header>

<div id="listaProdutos">
    <br>
    <div class="cadastroProd">
        <h2>CADASTRO DE PRODUTOS</h2>
    </div>
    <br>

    <body page="lista">

        <table class="tabelaLista">
            <thead>
                <tr>
                    <th class="colunas">Código</th>
                    <th class="colunas">Nome</th>
                    <th class="colunas">Valor Atacado</th>
                    <th class="colunas">Valor Varejo</th>
                    <th class="colunas">Quantidade</th>
                    <th class="colunas">Outras Ações</th>
                </tr>

            </thead>
            <tbody id="listaProdutosBody"></tbody>
        </table>

        <br><br>
        <div>
            <br><br>
            <button class="NovoProd" onclick="vizualizar('cadastro', true)">Novo produto</button>
        </div>

</div>

<form id="cadastroProdutos">
    <div class="cadastroProd">
        <h2>CADASTRO DE PRODUTOS</h2>
    </div>

    <table class="preenchimentos">
        <tr> 
            <td  class="linhaPreenchimentos">
                <div class="label">
                    <div>Código</div>
                    <div>
                        <input type="text" maxlength="6" size="10" id="id">
                    </div>
                </div>
            </td>
            <td class="linhaPreenchimentos">
                <div class="label">
                    <div>Descrição</div>
                    <div>
                        <input type="text" size="90" id="descricao" >
                    </div>
                </div>
            </td>
        </tr>
    </table>
           
    <table class="preenchimentos">
        <tr>
            <td  class="linhaPreenchimentos">
                <div class="label">
                    <div>Tipo de Produto</div>
                    <div>
                        <input type="text" id="tipoProd" size="10" >
                    </div>
                </div>
            </td>
            <td  class="linhaPreenchimentos">
                <div class="label">
                    <div>Unidade</div>
                    <div>
                        <input type="text" id="unidade" size="10"  >
                    </div>
                </div>
            </td>
            <td  class="linhaPreenchimentos">
                <div class="label">
                    <div>Saldo</div>
                    <div>
                        <input type="number" id="saldo" size="10" >
                    </div>
                </div>
            </td>
        </tr>   

    </table>

    <div>
        <input class="botCad" type="submit" value="Cadastrar">
    </div>

</form>


</body>
 
<?php
    } else
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";
?> 
</html>
