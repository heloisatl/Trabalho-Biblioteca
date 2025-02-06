CREATE TABLE MaterialBiblioteca (

    /* Atributos de MaterialBiblioteca*/
    id int AUTO_INCREMENT NOT NULL,
    titulo varchar(255) NOT NULL,
    autor varchar(255) NOT NULL,
    ano_publicacao int NOT NULL,
    editor varchar(255) NOT NULL,

   /*Atributos de Livro*/
    numero_paginas int,
    genero varchar(255),

    /*Atributos de Revista*/
    edicao varchar(255),
    periodicidade int,

    /*Atributos de GIBIS*/
    ilustrador varchar(255),
 
    PRIMARY KEY (id)
);