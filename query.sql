CREATE DATABASE sga CHARACTER SET utf8 COLLATE utf8_general_ci;

USE sga;

CREATE TABLE IF NOT EXISTS usuario(
  idUsuario INT(10) AUTO_INCREMENT PRIMARY KEY,
  login VARCHAR(10) not null UNIQUE,
  senha VARCHAR(32) not null,
  nome VARCHAR(50) not null,
  active ENUM('0', '1', '2')-- 0 desativo 1 - normal  2 - admin
);



CREATE TABLE IF NOT EXISTS usuario_image(
  idUsuario_image INT(10) PRIMARY KEY AUTO_INCREMENT,
  Usuario_idUsuario INT(10) not null,
  imagePath VARCHAR(50) not null,
  --FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario)
);



CREATE TABLE IF NOT EXISTS coordenador(
  idCoordenador INT(10) PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50) not null,
  imagePath VARCHAR(50) not null,
  Ministerio_idMinisterio INT(1) UNIQUE NOT NULL
);


CREATE TABLE IF NOT EXISTS ministerio(
  idMinisterio INT(10) PRIMARY KEY AUTO_INCREMENT,
  --Coordenador_idCoordenador INT(10) not null,
  Usuario_idUsuario INT(10) not null,
  descricao VARCHAR(150) not null,
  nome VARCHAR(30) not null,
  --FOREIGN KEY(Coordenador_idCoordenador) REFERENCES coordenador(idCoordenador)
);


CREATE TABLE IF NOT EXISTS video(
    idVideo INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    titulo VARCHAR(25) not null,
    descricao VARCHAR(150) not null,
    url VARCHAR(50) not null,
    --FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario)
);


CREATE TABLE IF NOT EXISTS testemunho(
    idTestemunho INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    email VARCHAR(50) not null,
    descricao VARCHAR(150) not null,
    nome VARCHAR(30) not null,
    --FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario)
);


CREATE TABLE IF NOT EXISTS reflexao(
    idReflexao INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    titulo VARCHAR(100) not null,
    corpo VARCHAR(400) not null,
    data DATETIME not null,
    --FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario)
);


CREATE TABLE IF NOT EXISTS atividade(
    idAtividade INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    titulo VARCHAR(105) not null,
    descricao VARCHAR(350) not null,
    tipo ENUM('ATD', 'EVT'), -- 1 atividades regulares 2 - eventos
    --FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario)
);

CREATE TABLE IF NOT EXISTS atividade_image(
  idAtividade_foto INT(10) PRIMARY KEY AUTO_INCREMENT,
  Atividade_idAtividade INT(10) not null,
  imagePath VARCHAR(50) not null,
  --FOREIGN KEY(Atividade_idAtividade) REFERENCES atividade(idAtividade)
);


CREATE TABLE IF NOT EXISTS galeria(
    idGaleria INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    titulo VARCHAR(105) not null,
    --FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario)
);


CREATE TABLE IF NOT EXISTS galeria_image(
    idGaleria_Foto INT(10) PRIMARY KEY AUTO_INCREMENT,
    Galera_idGaleria INT(10) not null,
    imagePath VARCHAR(50) not null
);

ALTER TABLE usuario_image
ADD CONSTRAINT FK_USUARIO_IMAGE
FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario);

ALTER TABLE coordenador
ADD CONSTRAINT FK_COORDENADOR_MINISTERIO
FOREIGN KEY(Ministerio_idMinisterio) REFERENCES ministerio(idMinisterio);

ALTER TABLE video
ADD CONSTRAINT FK_VIDEO_USUARIO
FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario);

ALTER TABLE quemsomos
ADD CONSTRAINT FK_QUEMSOMOS_USUARIO
FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario);

ALTER TABLE testemunho
ADD CONSTRAINT FK_TESTEMUNHO_USUARIO
FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario);


ALTER TABLE reflexao
ADD CONSTRAINT FK_REFLEXAO_USUARIO
FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario);

ALTER TABLE atividade
ADD CONSTRAINT FK_VIDEO_USUARIO
FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario);

ALTER TABLE atividade_image
ADD CONSTRAINT FK_ATIVIDADE_IMAGE
FOREIGN KEY(Atividade_idAtividade) REFERENCES atividade(idAtividade);

ALTER TABLE galeria
ADD CONSTRAINT FK_GALERIA_USUARIO
FOREIGN KEY(Usuario_idUsuario) REFERENCES usuario(idUsuario);

ALTER TABLE galeria_image
ADD CONSTRAINT FK_GALERIA_IMAGE
FOREIGN KEY(Galeria_idGaleria) REFERENCES galeria(idGaleria);
