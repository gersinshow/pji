create database projeto_jif;
use projeto_jif;

create table pessoas (
	cpf varchar(20) not null,
    nome varchar (50) not null,
    sexo varchar(9) not null,
    datanasc date not null,
    primary key (cpf)
);

create table unidade (
	id_unidade int not null auto_increment,
	instituicao varchar(255) not null,
    campus varchar(255) not null,
    primary key (id_unidade)
);

create table atleta (
	cpf varchar(20),
    primary key (cpf),
    foreign key (cpf) references pessoas(cpf)
);

create table delegacao (
	cpf varchar(20),
    chefe varchar(50) not null,
    primary key (cpf),
    foreign key (cpf) references pessoas(cpf)
);

create table modalidade (
	id_modalidade int not null auto_increment,
    nome varchar(20),
    primary key (id_modalidade)
);

create table equipe (
	id_equipe int not null auto_increment,
    nome varchar(50),
	id_unidade int not null,
    primary key (id_equipe),
    foreign key (id_unidade) references unidade(id_unidade)
);