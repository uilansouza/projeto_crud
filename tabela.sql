create schema fp_73;

CREATE TABLE categoria(
 id int not null primary key auto_increment,
 nome varchar(50) not null,
 );


INSERT INTO categoria(nome)values
('eletronicos'),
('moveis'),
('lazer'),
('vestuario'),
('esporte');


create table produtos(
id int not null primary key auto_increment,
nome varchar(50),
preco decimal(10,2),
quant int,
id_categoria int
);
