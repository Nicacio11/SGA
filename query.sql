CREATE DATABASE sga;
USE sga;

CREATE TABLE IF NOT EXISTS usuario(
  idUsuario INT(10) AUTO_INCREMENT PRIMARY KEY,
  login VARCHAR(10) not null,
  senha VARCHAR(32) not null,
  nome VARCHAR(50) not null,
  active VARCHAR(1) not null-- 0 desativo 1 - normal  2 - admin
);


CREATE TABLE IF NOT EXISTS usuario_foto(
  idUsuario_foto INT(10) PRIMARY KEY AUTO_INCREMENT,
  Usuario_idUsuario INT(10) not null,
  imagePath VARCHAR(50) not null
);


CREATE TABLE IF NOT EXISTS coordenador(
  idCoordenador INT(10) PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50) not null,
  imagePath VARCHAR(50) not null
);

CREATE TABLE IF NOT EXISTS ministerio(
  idMinisterio INT(10) PRIMARY KEY AUTO_INCREMENT,
  Coordenador_idCoordenador INT(10) not null,
  Usuario_idUsuario INT(10) not null,
  descricao VARCHAR(150) not null,
  nome VARCHAR(30) not null
);

CREATE TABLE IF NOT EXISTS video(
    idVideo INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    titulo VARCHAR(25) not null,
    descricao VARCHAR(150) not null,
    url VARCHAR(50) not null
);
CREATE TABLE IF NOT EXISTS quemsomos(
    idQuemSomos INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    titulo VARCHAR(25) not null,
    descricao VARCHAR(150) not null
);

CREATE TABLE IF NOT EXISTS testemunho(
    idTestemunho INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    email VARCHAR(50) not null,
    descricao VARCHAR(150) not null,
    nome VARCHAR(30) not null
);
CREATE TABLE IF NOT EXISTS pedido(
    idPedido INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    email VARCHAR(50) not null,
    descricao VARCHAR(150) not null,
    nomePessoa VARCHAR(30) not null,
    emailPessoa VARCHAR(50) not null
);
CREATE TABLE IF NOT EXISTS pedido_pessoa(
    idPessoa INT(10) PRIMARY KEY AUTO_INCREMENT,
    Pedido_idPedido INT(10) not null,
    nomePessoa VARCHAR(30) not null,
    emailPessoa VARCHAR(50) not null
);

CREATE TABLE IF NOT EXISTS reflexao(
    idReflexao INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    titulo VARCHAR(100) not null,
    corpo VARCHAR(400) not null,
    data DATETIME not null
);

CREATE TABLE IF NOT EXISTS atividade(
    idAtividade INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    titulo VARCHAR(105) not null,
    descricao VARCHAR(350) not null,
    imagePath VARCHAR(50),
    tipo char(1) -- 1 atividades regulares 2 - eventos
);

CREATE TABLE IF NOT EXISTS galeria(
    idGaleria INT(10) PRIMARY KEY AUTO_INCREMENT,
    Usuario_idUsuario INT(10) not null,
    titulo VARCHAR(105) not null,
);

CREATE TABLE IF NOT EXISTS galeria_foto(
    idGaleria_Foto INT(10) PRIMARY KEY AUTO_INCREMENT,
    Galera_idGaleria INT(10) not null,
    imagePath VARCHAR(50) not null,
);
