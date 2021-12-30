create database BANCO_SMPSIP;
USE BANCO_SMPSIP; 

CREATE TABLE Perfil
(
  idPerfil INT(10) NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL,
  PRIMARY KEY (idPerfil)
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


USE BANCO_SMPSIP;
insert into Perfil (descricao) values ('Administrador');
insert into Perfil (descricao) values ('Usuário');


USE BANCO_SMPSIP;
INSERT INTO perfil
(descricao)
VALUES
('Administrador');


USE BANCO_SMPSIP;
INSERT INTO perfil
(descricao)
VALUES
('Usuário');


USE BANCO_SMPSIP;
CREATE TABLE Usuario
 (
  idUsuario INT(10) NOT NULL AUTO_INCREMENT,
  Nome VARCHAR(200) NOT NULL,
  Login VARCHAR(50) NOT NULL,
  Senha VARCHAR(50) NOT NULL,
  Email VARCHAR(100) NOT NULL,
  Matricula VARCHAR(250) NOT NULL,
  idPerfil INT(10) NOT NULL,
  PRIMARY KEY (idUsuario),
  CONSTRAINT FK_PerfilUsuario
  FOREIGN KEY (idPerfil)
  REFERENCES perfil (idPerfil)
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


USE BANCO_SMPSIP;
CREATE TABLE Mapeamento
(
  idMapeamento INT(11) NOT NULL AUTO_INCREMENT,
  Desc_Desordem VARCHAR(2000) NOT NULL,
  Endereco VARCHAR(500) NOT NULL,
  Org_Responsavel VARCHAR(2000) NOT NULL,
  Cod_Desordem VARCHAR(20) NOT NULL,
  Data DATE NOT NULL,
  Ponto VARCHAR(11) NOT NULL,
  Tipo_Desordem VARCHAR(8) NOT NULL,
  Status VARCHAR(500) NOT NULL,
  Foto LONGBLOB NOT NULL,
  usuario_idUsuario INT(10) NOT NULL,
  PRIMARY KEY (idMapeamento),
  CONSTRAINT fk_mapeamento_usuario1
  FOREIGN KEY (usuario_idUsuario)
  REFERENCES usuario (idUsuario)
)
ENGINE = InnoDB
AUTO_INCREMENT=1
DEFAULT CHARACTER SET = utf8;


USE BANCO_SMPSIP;
CREATE TABLE Checagem
(
  idChecagem INT(11) NOT NULL AUTO_INCREMENT,
  Desc_Desordem VARCHAR(2000) NOT NULL,
  Endereco VARCHAR(500) NOT NULL,
  Org_Responsavel VARCHAR(2000) NOT NULL,
  Cod_Desordem VARCHAR(20) NOT NULL,
  Data DATE NOT NULL,
  Ponto VARCHAR(11) NOT NULL,
  Tipo_Desordem VARCHAR(8) NOT NULL,
  Status VARCHAR(500) NOT NULL,
  Foto LONGBLOB NOT NULL,
  usuario_idUsuario INT(10) NOT NULL,
  PRIMARY KEY (idChecagem),
  CONSTRAINT fk_checagem_usuario1
  FOREIGN KEY (usuario_idUsuario)
  REFERENCES usuario (idUsuario)
)
ENGINE = InnoDB
AUTO_INCREMENT=1
DEFAULT CHARACTER SET = utf8;

INSERT INTO `usuario`(`Nome`, `Login`, `Senha`, `Email`, `idPerfil`, `Matricula`) VALUES ('Eliane','Eliane','123','Eliane.Silva@gmail.com','1','123456');