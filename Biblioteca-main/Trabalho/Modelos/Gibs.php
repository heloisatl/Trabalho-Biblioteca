<?php 

require_once("MaterialBiblioteca.php");

class Gibs extends MaterialBiblioteca{

    // Atributos:
    private string $ilustrador;

    // Métodos:
    public function getDetalhes() {
        return parent::getDetalhes() . 
               " | Ilustrador: " . $this->getIlustrador();
    }


    
    public function getTipo(){
        return "Gib";
    }


    // GETs e SETs:
    public function getIlustrador(): string {
        return $this->ilustrador;
    }
    public function setIlustrador(string $ilustrador): self {
        $this->ilustrador = $ilustrador;
        return $this;
    }
}