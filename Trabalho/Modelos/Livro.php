<?php

require_once("MaterialBiblioteca.php");


class Livro extends MaterialBiblioteca{

    // Atributos: 
    private int $numPag;
    private string $genero;

    // Métodos:
    public function getDetalhes() {
        return parent::getDetalhes() . 
               " | Páginas: " . $this->numPag . 
               " | Gênero: " . $this->genero;
    }

    public function getTipo(){
        return "Livro";
    }



    // GETs e SETs:
    public function getNumPag(): int {
        return $this->numPag;
    }
    public function setNumPag(int $numPag) {
        $this->numPag = $numPag;
    }

    public function getGenero(): string {
        return $this->genero;
    }
    public function setGenero(string $genero) {
        $this->genero = $genero;
    }
}
