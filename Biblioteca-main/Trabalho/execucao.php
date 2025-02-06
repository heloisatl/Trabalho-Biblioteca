<?php

require_once("Modelos/Livro.php");
require_once("Modelos/Revista.php");
require_once("Modelos/Gibis.php");
require_once("DAO/MaterialBibliotecaDAO.php");

// Teste da conexão
/*require_once("util/Conexao.php");
$con = Conexao::getCon();
print_r($con);*/


do {
    echo "---------- BIBLIOTECA ---------------" . "\n";
    echo "1- Cadastrar Livro ------------------" . "\n";
    echo "2- Cadastrar Revista ----------------" . "\n";
    echo "3- Cadastrar Gibis -------------------" . "\n";
    echo "4- Buscar Material da Biblioteca ---" . "\n";
    echo "5- Listar Material da Biblioteca ---" . "\n";
    echo "6- Excluir Material da Biblioteca --" . "\n";
    echo "0- Sair -----------------------------" . "\n";

    $opcao = readline("Informe a opção desejada: ");

    switch ($opcao) {
        case 1:

            $material = new Livro();
            $material->getTipo();
            $material->setTitulo(readline("Informe o Título: "));
            $material->setAutor(readline("Informe o Autor: "));
            $material->setAnoPublicacao(readline("Informe o Ano de Publicação: "));
            $material->setEditor(readline("Informe o Editor: "));
            $material->setNumPag(readline("Informe o Número de Páginas: "));
            $material->setGenero(readline("Informe o Gênero: "));

            $materialDAO = new MaterialBibliotecaDAO();
            $materialDAO->inserirMaterial($material);

            echo "Livro cadastrado com sucesso!!!\n";
            break;

        case 2:
            $material = new Revista();
            $material->setTitulo(readline("Informe o Título: "));
            $material->setAutor(readline("Informe o Autor: "));
            $material->setAnoPublicacao(readline("Informe o Ano de Publicação: "));
            $material->setEditor(readline("Informe o Editor: "));
            $material->setEdicao(readline("Informe a Edição: "));
            $material->setPeriodicidade(readline("Informe a Periodicidade: "));

            $materialDAO = new MaterialBibliotecaDAO();
            $materialDAO->inserirMaterial($material);

            echo "Revista cadastradada com sucesso!!!\n";
            break;

        case 3:
            $material = new Gibis();
            $material->setTitulo(readline("Informe o Título: "));
            $material->setAutor(readline("Informe o Autor: "));
            $material->setAnoPublicacao(readline("Informe o Ano de Publicação: "));
            $material->setEditor(readline("Informe o Editor: "));
            $material->setIlustrador(readline("Informe o Ilustrador: "));

            $materialDAO = new MaterialBibliotecaDAO();
            $materialDAO->inserirMaterial($material);

            echo "Gibis cadastrado com sucesso!!!\n";
            break;

        case 4:
            //Buscar os objetos do banco de dados
            $materialDAO = new MaterialBibliotecaDAO();
            $materiais = $materialDAO->listarMateriais();

            //Exibir os dados dos objetos
            foreach ($materiais as $m) {

                // Verifica se o método getDetalhes existe antes de chamá-lo
                foreach ($materiais as $material) {
                    echo $material->getDetalhes() . "\n"; // Exibe os detalhes do material
                }
            }

            break;

        case 5:

            //pra deixar o codigo mais fluido, tem como listar todos os livros ja cadastrados junto do id ANTES de pedir para informar o id do material, para que a pessoa saiba qual id ela quer;
            $id = readline("Informe o ID do material: ");

            $materialDAO = new MaterialBibliotecaDAO();
            $material = $materialDAO->buscarPorId($id);
            if ($material != null)
                echo $material->getDetalhes() . "\n"; // Chama o método corretamente
            else
                echo "Material não encontrado!\n";

            break;

        case 6:
            //EXCLUSÃO PELO ID DO CLIENTE

            //1- Listar os clientes
            $materialDAO = new MaterialBibliotecaDAO();
            $materiais = $materiaisDAO->listarMateriais();
            foreach ($materiais as $m)
                echo $m;

            $id = readline("Informe o ID do material a ser excluído: ");

            $material = $materialDAO->buscarPorId($id);
            if ($material) {

                $materialDAO->excluirPorId($id);

                echo " Material excluído com sucesso!\n";
            } else
                echo "Material não encontrado!\n";

            break;

        case 0:
            echo "Programa encerrado!\n";
            break;

        default:
            echo "Opção inválida!";
    }
} while ($opcao != 0);
