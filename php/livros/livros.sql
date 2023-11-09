create database livros;

CREATE TABLE biblioteca(
	idBiblioteca int not null auto_increment,
    registro smallint not null unique, 
    nome varchar(80) not null,
    endereco varchar(80) not null,
    bairro varchar(30) not null,
    cidade varchar(30) not null,
    primary key (id)
);

CREATE TABLE livro(
	idLivro int not null auto_increment,
    codigo smallint not null unique,
    nome varchar(80) not null,
    autor varchar(20) not null,
    data_pb varchar(20) not null,
    edicao varchar(20) not null,
    biblioteca int,
    primary key (id),
    foreign key (biblioteca) references biblioteca(idBiblioteca)
);