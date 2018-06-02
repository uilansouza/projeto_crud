c


INSERT INTO categoria(nome)values ('eletronicos'), ('moveis'), ('lazer'), ('vestuario'), ('esporte')



select * from categoria;


drop table categoria;

CREATE TABLE categoria(
 id int not null primary key auto_increment,
 nome varchar(50) not null,
 descricao varchar(45)

);
