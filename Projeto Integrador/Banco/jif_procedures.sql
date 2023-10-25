DELIMITER $$
CREATE PROCEDURE inserir_modalidade(IN id INT, IN nome varchar(20) )
BEGIN
      insert into modalidade(id_modalidade, nome) values (id, nome);
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE inserir_unidade(IN id INT, IN sigla varchar(10), campus varchar(25)  )
BEGIN
      insert into unidade(id_unidade, sigla_instituicao, campus)
           values (id, sigla, campus);
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE inserir_pessoa(IN cpf varchar(11), IN nome varchar(35), 
        sexo varchar(1), datanasc date )
BEGIN
      insert into pessoa(cpf, nome, sexo, datanasc)
           values (cpf, nome, sexo, datanasc);
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE inserir_atleta(IN cpf varchar(14), IN nome varchar(35), 
        sexo varchar(1), datanasc date,  rg varchar(12), ra varchar(35), responsavel varchar(35),
		foto_rg text, foto_rosto text)
BEGIN
      insert into pessoa(cpf, nome, sexo, datanasc, rg, ra, responsavel, foto_rg, foto_rosto)
           values (cpf, nome, sexo, datanasc, rg, ra, responsavel, foto_rg, foto_rosto);
END $$
DELIMITER ;



