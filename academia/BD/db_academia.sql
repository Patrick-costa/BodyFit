create database academia;

use academia;

create table tb_plano(
	id_plano int primary key auto_increment,
    plano varchar(45) not null,
    preco float not null
);

create table tb_login(
	id_login int primary key auto_increment,
    usuario varchar(100) not null unique,
    senha varchar(100) not null,
    tipo varchar(20)
);

create table tb_endereco(
	id_endereco int primary key auto_increment,
    rua varchar(150) not null,
    numero int,
    complemento varchar(150),
    uf char(3) not null,
    cidade varchar(100) not null,
    bairro varchar(100) not null,
    cep varchar(30) not null
);

create table tb_telefone(
	id_telefone int primary key auto_increment,
    telefone_1 varchar(45) not null,
    telefone_2 varchar(45),
    telefone_3 varchar(45)
);

create table tb_aluno(
	id_aluno int primary key auto_increment,
    primeiro_nome varchar(50) not null,
    segundo_nome varchar(50),
    terceiro_nome varchar(50) not null,
    matricula int not null unique,
    cpf varchar(15) not null unique,
    estado_civil varchar(20) not null,
    email varchar(200) not null unique,
    data_cadastro datetime not null,
    login_id int not null,
    telefone_id int not null,
    endereco_id int not null,
    constraint fk_login foreign key(login_id) references tb_login(id_login),
    constraint fk_telefone foreign key(telefone_id) references tb_telefone(id_telefone),
    constraint fk_endereco foreign key(endereco_id) references tb_endereco(id_endereco)
);

create table tb_lojas(
	id_loja int primary key auto_increment,
    localizacao varchar(100) not null,
    cnpj varchar(25) not null unique,
    endereco_id int not null,
    constraint fk_endereco_loja foreign key(endereco_id) references tb_endereco(id_endereco)
);

/*create table tb_lojas_funcionario(
	id_loja int not null,
    id_funcionario int not null,
    constraint fk_loja foreign key(id_loja) references tb_lojas(id_loja),
    constraint fk_funcionario foreign key(id_funcionario) references tb_funcionario(id_funcionario)
);*/

/*create table tb_atividades(
	id_atividade int primary key auto_increment,
    nome_atividade varchar(100) not null
);*/

/*create table tb_horarios(
	id_horario int primary key auto_increment,
    horario varchar(20) not null
);*/

/*reate table tb_atividades_horarios(
	horario_id int not null,
    atividade_id int not null,
    constraint fk_horario foreign key(horario_id) references tb_horarios(id_horario),
    constraint fk_atividade foreign key(atividade_id) references tb_atividades(id_atividade)
);*/

create table tb_grade_dias(
id int primary key auto_increment,
horario varchar(20),
segunda_feira varchar(20),
terca_feira varchar(20),
quarta_feira varchar(20),
quinta_feira varchar(20),
sexta_feira varchar(20),
sabado varchar(20)
);

create table tb_curriculos(
	id_solicitacao int primary key auto_increment,
    Nome varchar(150) not null,
    email varchar(255) not null,
    cpf varchar(20) not null,
    rg varchar(20) not null,
    telefone_1 varchar(20) not null,
    telefone_2 varchar(20) not null,
    pergunta text not null,
    arquivo varchar(200) not null,
    data datetime not null
);

create table tb_faleconosco(
	id int primary key auto_increment,
    descricao text not null,
    nome varchar(150) not null,
    data datetime not null,
    email varchar(255) not null,
    telefone varchar(30) not null,
    tipo varchar(50) not null
);
