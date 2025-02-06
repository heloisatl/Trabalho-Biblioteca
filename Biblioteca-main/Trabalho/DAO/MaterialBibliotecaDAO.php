<?php

require_once("Modelos/Gibis.php");
require_once("Modelos/Livro.php");
require_once("Modelos/MaterialBiblioteca.php");
require_once("Modelos/Revista.php");
require_once("Util/Conexao.php");

class MaterialBibliotecaDAO
{

    // Método para inserir Material
    public function inserirMaterial(MaterialBiblioteca $material)
    {

        $sql = "INSERT INTO MaterialBiblioteca
                (tipo, titulo, autor, ano_publicacao, editor, numero_paginas, genero, edicao, periodicidade, ilustrador)
                VALUES
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $con = Conexao::getCon();

        $stm = $con->prepare($sql);
        if ($material instanceof Livro) {
            $stm->execute(array(
                $material->getTipo(),
                $material->getTitulo(),
                $material->getAutor(),
                $material->getAnoPublicacao(),
                $material->getEditor(),
                $material->getNumPag(),
                $material->getGenero(),
                null,
                null,
                null
            ));
        } else if ($material instanceof Revista) {
            $stm->execute(array(
                $material->getTipo(),
                $material->getTitulo(),
                $material->getAutor(),
                $material->getAnoPublicacao(),
                $material->getEditor(),
                null,
                null,
                $material->getEdicao(),
                $material->getPeriodicidade(),
                null
            )); 
        } else if($material instanceof Gibis)  {
                $stm->execute(array(
                    $material->getTipo(),
                    $material->getTitulo(),
                    $material->getAutor(),
                    $material->getAnoPublicacao(),
                    $material->getEditor(),
                    null,
                    null,
                    null,
                    null,
                    $material->getIlustrador()
            )); 
        }
    }

    // Método para listar Material:

    public function listarMateriais() {
        $sql = "SELECT * FROM MaterialBiblioteca";

        $con = Conexao::getCon();

        $stm = $con->prepare($sql);
        $stm->execute();
        $registros = $stm->fetchAll();

        $materiais = $this->mapMateriais($registros);
        return $materiais;
    }

    private function mapMateriais(array $registros) {
        $materiais = array();
        foreach($registros as $reg) {
            $material = null;
            if($reg['tipo'] == 'Livro') {
                $material = new Livro();
                $material->setNumPag($reg['numero_paginas']);
                $material->setgenero($reg['genero']);
            } else if ($reg['tipo'] == 'Revista'){
                $material = new Revista();
                $material->setEdicao($reg['edicao']);
                $material->setPeriodicidade($reg["periodicidade"]);
            } /*else{
                $material = new Gibs();
                $material->setIlustrador($reg["ilustrador"]);
            }*/

            $material->setId($reg['id']);
            $material->setTitulo($reg['titulo']);
            $material->setAutor($reg['autor']);
            $material->setAnoPublicacao($reg['ano_publicacao']);
            $material->setEditor($reg['editor']);
            array_push($materiais, $material);
        }
        return $materiais;
    }

    public function buscarPorId(int $idMaterial) {
        $con = Conexao::getCon();

        $sql = "SELECT * FROM MaterialBiblioteca WHERE id = ?";

        $stm = $con->prepare($sql);
        $stm->execute([$idMaterial]);

        $registros = $stm->fetchAll();

        $materiais = $this->mapMateriais($registros);

        if(count($materiais) > 0)
            return $materiais[0];
        
        return null;
    }

    public function excluirPorId(int $idMaterial) {
        $con = Conexao::getCon();

        $sql = "DELETE FROM MaterialBiblioteca WHERE id = ?";

        $stm = $con->prepare($sql);
        $stm->execute([$idMaterial]);
    }
}
