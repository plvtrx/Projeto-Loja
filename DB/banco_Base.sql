create database LojaABC;
use LojaABC;

create table admin (
    idAdmin int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null unique,
    senha varchar(255) not null
);

create table clientes (
    idCliente int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null unique,
    senha varchar(255) not null,
    cpf varchar(11) not null unique
);

create table produto (
    idProduto int primary key auto_increment,
    nome varchar(100) not null,
    descricao text not null,
    preco decimal(10,2) not null,
    quantidade int not null
);
