<?php 

require_once("MaterialBiblioteca.php");

class Gibis extends MaterialBiblioteca{

    // Atributos:
    private string $ilustrador;

    // Métodos:
    public function getDetalhes() {
        return parent::getDetalhes() . 
               " | Ilustrador: " . $this->getIlustrador();
    }


    
    public function getTipo(){
        return "Gibi";
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