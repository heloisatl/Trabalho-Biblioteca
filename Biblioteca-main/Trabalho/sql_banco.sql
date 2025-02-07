CREATE TABLE MaterialBiblioteca (

    /* Atributos de MaterialBiblioteca*/
    id int AUTO_INCREMENT NOT NULL,
    titulo varchar(255) NOT NULL,
    autor varchar(255) NOT NULL,
    ano_publicacao int NOT NULL,
    editor varchar(255) NOT NULL,

   /*Atributos de Livro*/
    numero_paginas int NOT NULL,
    genero varchar(255) NOT NULL,

    /*Atributos de Revista*/
    edicao varchar(255) NOT NULL,
    periodicidade int NOT NULL,

    /*Atributos de GIBS*/
    ilustrador varchar(255) NOT NULL,
 
    PRIMARY KEY (id)
);