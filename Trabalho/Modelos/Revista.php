<?php

require_once("MaterialBiblioteca.php");

class Revista extends MaterialBiblioteca {

    // Atributos:
    private $edicao;
    private $periodicidade;

    // Métodos:
    public function getDetalhes() {
        return parent::getDetalhes() . 
               " | Edição: " . $this->edicao . 
               " | Período: " . $this->periodicidade;
    }

    public function getTipo(){
        return "Revista";
    }


    // GETs e SETs:
    public function getEdicao() : int {
        return $this->edicao;
    }
    public function setEdicao($edicao) {
        $this->edicao = $edicao;
        return $this;
    }

    public function getPeriodicidade() : string {
        return $this->periodicidade;
    }
    public function setPeriodicidade($periodicidade) {
        $this->periodicidade = $periodicidade;
        return $this;
    }
}