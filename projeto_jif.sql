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
	instituicao varchar(255) not null,
    campus varchar(255) not null,
    primary key (campus)
);

create table atleta (
	cpf varchar (20) not null,
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
	id_unidade varchar(255) not null,
    saldo_equipe int not null,
    primary key (id_equipe),
    foreign key (id_unidade) references unidade(campus)
);

create table formacao (
    id_unidade varchar(255),
    cpf_atleta varchar(20),
    id_equipe int,
    primary key (id_unidade, cpf_atleta, id_equipe),
    foreign key (cpf_atleta) references atleta(cpf),
    foreign key (id_unidade) references unidade(campus),
    foreign key (id_equipe) references equipe(id_equipe)
);

create table partidas (
    id_partida int not null auto_increment,
    data date not null,
    local_partida varchar(250),
    fase varchar(20),
    id_equipe1 int not null,
    id_equipe2 int not null,
    primary key (id_partida),
    foreign key (id_equipe1) references equipe(id_equipe),
    foreign key (id_equipe2) references equipe(id_equipe)
);

create table campeonato(
	ano date not null,
    titulo varchar(90)
);
INSERT INTO pessoas VALUES
('902.222.194-55', 'Gerson Datena', 'Masculino', '2007-08-15'),
('123.456.789-10', 'João da Silva', 'Masculino', '2001-02-15'),
('234.567.890-21', 'Maria Oliveira', 'Feminino', '2002-05-20'),
('345.678.901-32', 'Pedro Santos', 'Masculino', '2000-12-10'),
('456.789.012-43', 'Ana Souza', 'Feminino', '2001-09-08'),
('567.890.123-54', 'Carlos Pereira', 'Masculino', '2003-04-14'),
('678.901.234-65', 'Laura Lima', 'Feminino', '2002-07-25'),
('789.012.345-76', 'Lucas Fernandes', 'Masculino', '2000-11-30'),
('890.123.456-87', 'Beatriz Almeida', 'Feminino', '2001-06-02'),
('901.234.567-98', 'André Santos', 'Masculino', '2003-01-18');

insert into unidade values
('IFSP', 'ARQ'),  -- Instituto Federal de São Paulo - Campus Araraquara
('IFRJ', 'NIT'),  -- Instituto Federal do Rio de Janeiro - Campus Niterói
('IFMG', 'BHZ'),  -- Instituto Federal de Minas Gerais - Campus Belo Horizonte
('IFCE', 'FOR'),  -- Instituto Federal do Ceará - Campus Fortaleza
('IFSC', 'FLN'),  -- Instituto Federal de Santa Catarina - Campus Florianópolis
('IFPR', 'CTBA'), -- Instituto Federal do Paraná - Campus Curitiba
('IFBA', 'SSA'),  -- Instituto Federal da Bahia - Campus Salvador
('IFRS', 'POA'),  -- Instituto Federal do Rio Grande do Sul - Campus Porto Alegre
('IFAM', 'MAN'),  -- Instituto Federal do Amazonas - Campus Manaus
('IFTO', 'PAL');  -- Instituto Federal do Tocantins - Campus Palmas

INSERT INTO atleta (cpf) 
VALUES 
('902.222.194-55'), -- Gerson Datena
('123.456.789-10'), -- João da Silva
('234.567.890-21'), -- Maria Oliveira
('345.678.901-32'), -- Pedro Santos
('456.789.012-43'); -- Ana Souza

INSERT INTO delegacao (cpf, chefe)
VALUES
('567.890.123-54', 'Carlos Pereira'),
('678.901.234-65', 'Laura Lima'),
('789.012.345-76', 'Lucas Fernandes'),
('890.123.456-87', 'Beatriz Almeida'),
('901.234.567-98', 'André Santos');

INSERT INTO modalidade (nome) 
VALUES 
('Natação'),
('Atletismo'),
('Vôlei'),
('Judô'),
('Basquete'),
('Futebol'),
('Handebol');

INSERT INTO equipe (nome, id_unidade, saldo_equipe) 
VALUES 
('Equipe Natação IFSP', 'IFSP - ARQ', 1200), -- IFSP - Campus Araraquara
('Equipe Atletismo IFRJ', 'IFRJ - NIT', 1500), -- IFRJ - Campus Niterói
('Equipe Vôlei IFMG', 'IFMG - BHZ', 1100), -- IFMG - Campus Belo Horizonte
('Equipe Judô IFCE', 'IFCE - FOR', 1300), -- IFCE - Campus Fortaleza
('Equipe Basquete IFSC', 'IFSC - FLN', 1400), -- IFSC - Campus Florianópolis
('Equipe Futebol IFPR', 'IFPR - CTBA', 1700), -- IFPR - Campus Curitiba
('Equipe Handebol IFBA', 'IFBA - SSA', 1600), -- IFBA - Campus Salvador
('Equipe Natação IFRS', 'IFRS - POA', 1500), -- IFRS - Campus Porto Alegre
('Equipe Atletismo IFAM', 'IFAM - MAN', 1400), -- IFAM - Campus Manaus
('Equipe Vôlei IFTO', 'IFTO - PAL', 1200); -- IFTO - Campus Palmas

INSERT INTO formacao (id_unidade, cpf_atleta, id_equipe) 
VALUES 
('IFSP - ARQ', '902.222.194-55', 1), -- Gerson Datena na Equipe Natação IFSP
('IFRJ - NIT', '123.456.789-10', 2), -- João da Silva na Equipe Atletismo IFRJ
('IFMG - BHZ', '234.567.890-21', 3), -- Maria Oliveira na Equipe Vôlei IFMG
('IFCE - FOR', '345.678.901-32', 4), -- Pedro Santos na Equipe Judô IFCE
('IFSC - FLN', '456.789.012-43', 5), -- Ana Souza na Equipe Basquete IFSC
('IFPR - CTBA', '567.890.123-54', 6), -- Carlos Pereira na Equipe Futebol IFPR
('IFBA - SSA', '678.901.234-65', 7), -- Laura Lima na Equipe Handebol IFBA
('IFRS - POA', '789.012.345-76', 8), -- Lucas Fernandes na Equipe Natação IFRS
('IFAM - MAN', '890.123.456-87', 9), -- Beatriz Almeida na Equipe Atletismo IFAM
('IFTO - PAL', '901.234.567-98', 10); -- André Santos na Equipe Vôlei IFTO

INSERT INTO partidas (data, local_partida, fase, id_equipe1, id_equipe2) 
VALUES 
('2023-10-01', 'Estádio A', 'Quartas de Final', 1, 2), -- Natação vs. Atletismo
('2023-10-02', 'Estádio B', 'Quartas de Final', 3, 4), -- Vôlei vs. Judô
('2023-10-03', 'Estádio C', 'Semifinal', 5, 6), -- Basquete vs. Futebol
('2023-10-04', 'Estádio D', 'Semifinal', 7, 8); -- Handebol vs. Natação

INSERT INTO campeonato (ano, titulo) 
VALUES 
('2023-01-01', 'Campeonato Nacional de Esportes 2023'),
('2023-01-01', 'Copa Interinstitucional 2023'),
('2023-01-01', 'Campeonato Brasileiro de Esportes 2023'),
('2023-01-01', 'Copa Internacional de Esportes 2023');



select * from delegacao;