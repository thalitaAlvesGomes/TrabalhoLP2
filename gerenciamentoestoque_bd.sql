create database gerenciamentoestoque_bd;

use gerenciamentoestoque_bd;

create table Usuarios
(
	id int not null primary key auto_increment,
    nome varchar(50) not null,
    email varchar(30) not null,
    username varchar(20) not null,
    senha varchar(15) not null,
	status		int			 not null, 
	tipoUsuario int			 not null
    -- constraint chk_usuario check (status in(1,2) AND tipoUsuario in(1,2,3))
);

insert into usuarios (nome, email, username, senha, status, tipoUsuario) values ('Administrador', 'admin@admin.com', 'admin', '123admin', 1, 1);


create table Tipo_Produto
(
	codigo varchar(5) not null primary key,
    descricao varchar(20) not null
);

create table Produtos 
(
	codigoProd int not null primary key auto_increment,
    descricao varchar(20) not null,
    tipoProd varchar(5) not null,
    unidade varchar(5) not null,
    saldo decimal(10,2)    null,
    foreign key (tipoProd) references Tipo_Produto(codigo)    
);

CREATE TABLE Fornecedores
(
    codigo int not null PRIMARY key AUTO_INCREMENT,
    razaoSocial varchar (100) not null,
    CNPJ varchar(18) not null,
    telefone varchar(20) not null,
    endereco varchar(100) not null
);

create TABLE Cotacao
(
    codigo int not null PRIMARY key AUTO_INCREMENT,
    codFornecedor int not null,
    status int not null,
    constraint fk_codForn foreign key (codFornecedor) REFERENCES Fornecedores(codigo)
    -- constraint chk_status check (status in(1,2))
);

CREATE TABLE Item_Cotacao
(
    item int not null AUTO_INCREMENT,
    codCotacao int not null,
    codProduto int not null,
    descricaoProd varchar(50) not null,
    qtd int not null,
    preco decimal(10,2) not null,
    totalItem decimal(10,2) not null,
    PRIMARY KEY (item, codCotacao),
    constraint fk_codCotacao FOREIGN KEY (codCotacao) REFERENCES Cotacao(codigo),
    constraint fk_prod FOREIGN KEY (codProduto) REFERENCES produtos(codigoProd)
);

create TABLE Pedidos
(
    codPedido int not null PRIMARY key AUTO_INCREMENT,
    codFornecedor int not null,
    codCotacao int not null,
    status int not null,
    -- constraint chk_statusPed check (status in(1,2)),
    constraint fk_codFor FOREIGN KEY (codFornecedor) REFERENCES Fornecedores(codigo),
    constraint fk_cotacao FOREIGN KEY (codCotacao) REFERENCES Cotacao(codigo)
);

CREATE TABLE Item_Pedido
(
    itemPedido int not null AUTO_INCREMENT,
    codPedido int not null,
    codProduto int not null,
    descricaoProd varchar(40) not null,
    qtd int not null,
    preco decimal(10,2) not null,
    totalItem decimal(10,2) not null,
    PRIMARY KEY (itemPedido, codPedido),
    constraint fk_forn FOREIGN KEY (codPedido) REFERENCES Pedidos(codPedido),
    constraint fk_produto FOREIGN KEY (codProduto) REFERENCES produtos(codigoProd)
);

