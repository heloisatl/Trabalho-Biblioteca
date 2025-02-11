<?php

abstract class MaterialBiblioteca 
{

    // Atributos:  
    private string $titulo;
    private int $anoPublicacao;
    private string $autor;
    private $id;
    private string $editor;

    // Métodos: 
    public function getDetalhes()
    {
        return " ID: " . $this->getId() .
               " |Título: " . $this->getTitulo() .
               " | Ano Publicação: " . $this->getAnoPublicacao() .
               " | Autor: " . $this->getAutor() .
               " | Editor: " . $this->getEditor();
    }
    abstract public function getTipo();



    public function __toString()
    {
        return " ID: " . $this->getId() .
               " |Título: " . $this->getTitulo() .
               " | Ano Publicação: " . $this->getAnoPublicacao() .
               " | Autor: " . $this->getAutor() .
               " | Editor: " . $this->getEditor(). "\n";
    }
    // GETs e SETs:
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo): self
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getAnoPublicacao()
    {
        return $this->anoPublicacao;
    }
    public function setAnoPublicacao($anoPublicacao): self
    {
        $this->anoPublicacao = $anoPublicacao;
        return $this;
    }

    public function getAutor()
    {
        return $this->autor;
    }
    public function setAutor($autor): self
    {
        $this->autor = $autor;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getEditor()
    {
        return $this->editor;
    }
    public function setEditor($editor): self
    {
        $this->editor = $editor;
        return $this;
    }
}
