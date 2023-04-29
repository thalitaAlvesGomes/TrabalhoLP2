<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="author" content="CDTT">
    <link rel="stylesheet" href="style.css">
    <title>Página Inicial</title>
</head>
<body id="home">
    <header class="cabecalho">
    <nav >
        <div class="menu">
        <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
    </div>
        <div class="logo">estoque.com</div>
        
        <ul>
            <li><i  class="	fa fa-home fa-2x"></i> <a href="#" class="active"> Principal </a> </li>
            <li><i class="	fa fa-edit fa-2x"></i> <a href="../Produtos/listarProdutos.php"> Produtos</a> </li>
            <li><i class="	fa fa-chevron-circle-right fa-2x"></i> <a href="../TipoProduto/listaTipoProd.php"> Tipos de Produto</a> </li>
            <li><i class="	fa fa-users fa-2x"></i><a href="../Fornecedores/listaForn.php"> Fornecedores</a> </li>
            <li><i class="	fa fa-plus fa-2x"></i><a href="../Requisicao/listaRequisicao.php"> Requisiçao</a> </li>
            <li><i class="	fa fa-file-text-o fa-2x"></i> <a href="#"> Relatórios</a> </li>
            <li><i class="  fa fa-cog fa-2x"></i><a href="#"> Configurações</a></li>
            <li><i class=" fa fa-sign-out fa-2x"></i><a href="../Login/telaLogin.php"> Sair</a></li>
        </ul>
<div class="busca">
    <input placeholder="Pesquise aqui" type="text">
</div>
<div class="Login">
<i class="fa fa-user fa-2x" onclick="UserShow"> &nbsp; Bem-vindo</i>
    </nav>
</header>
    <script src="main.js"></script>
</body>
</html>