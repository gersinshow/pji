create database projeto_jif;
use projeto_jif;

-- CADASTROS GERAIS
---------------------------------------------------
create table modalidade (
    id_modalidade int,
    nome varchar(20),
    primary key (id_modalidade)
);

create table unidade (
    id_unidade int,
    sigla_instituicao varchar(10) not null,
    campus varchar(25) not null,
    primary key (id_unidade)
);

create table pessoa (
    cpf varchar(14),
    nome varchar(35) not null,
    sexo varchar(1) not null,
    datanasc date not null,
    rg varchar(12),
    ra varchar(35),
    responsavel varchar(35),
    foto_rg text,
    foto_rosto text,
    primary key (cpf)
);

-- PARA CADA campeonato
--------------------------------------------------------
create table campeonato (
    id_campeonato int,
    ano varchar(4),
    titulo varchar(30),
    primary key (id_campeonato)
);

-- PARA CADA EQUIPE DO CAMPEONATO
create table equipe (
    id_campeonato int,
    id_modalidade int,
    id_unidade int,
	id_equipe int,
    nome varchar(30),
    primary key (id_campeonato, id_modalidade, id_unidade, id_equipe),
	foreign key fk_equipe_campeonato (id_campeonato) references campeonato(id_campeonato),
    foreign key fk_equipe_modalidade (id_modalidade) references modalidade(id_modalidade),
	foreign key fk_equipe_unidade (id_unidade) references unidade(id_unidade)
);

create table equipe_delegacao (
    id_campeonato int,
    id_modalidade int,
    id_unidade int,
	id_equipe int,
    cpf varchar(11),
    chefe varchar(1),
    primary key (id_campeonato, id_modalidade, id_unidade, id_equipe, cpf),
	foreign key fk_equipe_delegacao_campeonato (id_campeonato) references campeonato(id_campeonato),
    foreign key fk_equipe_delegacao_modalidade (id_modalidade) references modalidade(id_modalidade),
	foreign key fk_equipe__delegacao_unidade (id_unidade) references unidade(id_unidade),	
	foreign key fk_delegacao_pessoas (cpf) references pessoa(cpf)
);

create table equipe_atleta (
    id_campeonato int,
	id_modalidade int,
    id_unidade int,
	id_equipe int,
    cpf varchar(11),
    primary key (id_campeonato, id_modalidade, id_unidade, id_equipe, cpf),
    foreign key fk_equipe_atleta_equipe (id_campeonato, id_modalidade, id_unidade, id_equipe) references equipe(id_campeonato, id_modalidade, id_unidade, id_equipe),
    foreign key fk_equipe_atleta_cpf (cpf) references pessoa(cpf)
) ;

create table partida(
    id_campeonato int,
    id_modalidade int,
    id_partida int,
	id_unidade1 int,
    id_equipe1 int not null,
	id_unidade2 int,
    id_equipe2 int not null,
    cidade char(50),
    local_partida varchar(50),
    data date not null,
    horario char(5),
    categoria char(25),
    arbitro1 char(50),
    arbitro2 char(50),
    apontador char(50),
    horario_1t_inicio varchar(5),
    horario_1t_fim varchar(5),
    horario_1t_result_equipe1 varchar(5),
    horario_1t_result_equipe2 varchar(5),
    horario_2t_inicio varchar(5),
    horario_2t_fim varchar(5),
    horario_2t_result_equipe1 varchar(5),
    horario_2t_result_equipe2 varchar(5),
    horario_prorrogacao_inicio varchar(5),
    horario_prorrogacao_fim varchar(5),
    horario_prorrogacao_result_equipe1 varchar(5),
    horario_prorrogacao_result_equipe2 varchar(5),
    ocorrencias varchar(255),
    primary key (id_campeonato, id_modalidade, id_partida),
    foreign key fk_partida_campeonato (id_campeonato) references campeonato(id_campeonato),
    foreign key fk_partida_modalidade (id_modalidade) references modalidade(id_modalidade),
    foreign key fk_partida_equipe1 (id_campeonato, id_modalidade, id_unidade1, id_equipe1) references equipe(id_campeonato, id_modalidade, id_unidade, id_equipe),
    foreign key fk_partida_equipe2 (id_campeonato, id_modalidade, id_unidade2, id_equipe2) references equipe(id_campeonato, id_modalidade, id_unidade, id_equipe)
);

create table partida_equipes_escalacao (
    id_campeonato int,
	id_modalidade int,
    id_partida int,
	id_unidade int,
    id_equipe int,
    cpf varchar(11),
	iniciante char(1),
    id_escalacao int not null,
    hora_amarelo1 varchar(5),
    hora_amarelo2 varchar(5),
    hora_vermelho varchar(5),
    primary key (id_campeonato, id_modalidade, id_partida, id_unidade, id_equipe, id_escalacao),
    foreign key fk_partida_equipes_escalacao_partida (id_campeonato, id_modalidade, id_partida) references partida(id_campeonato,id_modalidade, id_partida)
);

create table partida_gols (
    id_campeonato int,
	id_modalidade int,
    id_partida int,
    id_equipe int,
    id_gol int,
    id_escalacao int,
    horario varchar(5),
    primary key (id_campeonato, id_modalidade, id_partida, id_equipe, id_gol)
);

