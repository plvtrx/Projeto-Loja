create database LojaABC;
use LojaABC;

create table admin (
    idAdmin int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null unique,
    senha varchar(255) not null,
    cpf varchar(11) not null unique
);

create table clientes (
    idCliente int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null unique,
    senha varchar(255) not null,
    cpf varchar(11) not null unique
);

CREATE TABLE produto (
    idProduto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL DEFAULT 0,
    imagem VARCHAR(500) DEFAULT NULL,
    criadoEm TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    atualizadoEm TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT chk_preco CHECK (preco >= 0),
    CONSTRAINT chk_quantidade CHECK (quantidade >= 0)
);