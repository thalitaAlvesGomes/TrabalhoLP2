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

	CREATE TABLE Fornecedores
	(
		codigo int not null PRIMARY key AUTO_INCREMENT,
		razaoSocial varchar (100) not null,
		CNPJ varchar(18) not null,
		telefone varchar(20) not null,
		endereco varchar(100) not null
	);

	create table Tipo_Produto
	(
		codigo varchar(7) not null primary key,
		descricao varchar(20) not null
	);
    
    insert into Tipo_Produto values
    ('PA','Produto Acabado'),
    ('MC','Material de Consumo'),
    ('MP','Matéria Prima'),
    ('EM','Embalagem');
    

	create table Produtos 
	(
		codigoProd int not null primary key auto_increment,
		descricao varchar(20) not null,
		tipoProd varchar(7) not null,
        codFornecedor int not null,
		unidade varchar(5) not null,
		saldo decimal(10,2)    null,
		constraint fk_tipoProd foreign key (tipoProd) references Tipo_Produto(codigo),
        constraint fk_codForn foreign key (codFornecedor) REFERENCES Fornecedores(codigo)
	);
    
    create table Requisicao 
    (
    	codRequisicao int not null primary key AUTO_INCREMENT,
        produtoCod int not null,
        quantidade decimal(10,2) not null,
        userReq int not null,
        constraint fk_produtoCod foreign key (produtoCod) references Produtos(codigoProd),
        constraint fk_userReq foreign key (userReq) REFERENCES Usuarios(id)
    );