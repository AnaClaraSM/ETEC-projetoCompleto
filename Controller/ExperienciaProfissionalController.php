<?php

    //Se a sessão não tiver sido iniciada
    if (!isset ($_SESSION)) {
        //Cria sessão
        session_start();
    }

    //Criação da classe ExperienciaProfissionalController
    class ExperienciaProfissionalController {

        //Método Inserir
        //Recebe os dados da experiência profissional e o id do usuário como parâmetros
        public function inserir ($inicio, $fim, $empresa, $descricao, $idusuario) {
            //Inclui a classe ExperienciaProfissional da camada Model
            require_once "../Model/ExperienciaProfissional.php";
            //Cria uma nova instância da classe ExperiênciaProfissional e popula seus atributos
            $expP = new ExperienciaProfissional();
            $expP->setInicio($inicio);
            $expP->setFim($fim);
            $expP->setEmpresa($empresa);
            $expP->setDescricao($descricao);
            $expP->setIdUsuario($idusuario);
            //Persiste os dados do objeto expP no BD e armazena o resultado
            $r = $expP->inserirBD();
            //Retorna o resultado da inserção
            return $r;
        }

        //Método Remover
        //Recebe o id da experiência profissional como parâmetro
        public function remover($id) {
            //Inclui a classe ExperienciaProfissional da camada Model
            require_once "../Model/ExperienciaProfissional.php";
            //Cria uma nova instância da classe
            $expP = new ExperienciaProfissional();
            //Acessa o método excluirBD do objeto com $id como parâmetro (exclusão do registro conforme seu id) e armazena o resultado
            $r = $expP->excluirBD($id);
            //Retorna o resultado da exclusão
            return $r;
        }

        //Método Gerar Lista
        //Recebe o id do usuário como parâmetro
        public function gerarLista($idusuario) {
            //Inclui a classe ExperienciaProfissional da camada Model
            require_once "../Model/ExperienciaProfissional.php";
            //Cria uma nova instância da classe
            $expP = new ExperienciaProfissional();
            //Acessa o método listarExperiencias com $idusuario como parâmetro (lista as experiências conforme o id do usuário), armazena e retorna os resultados da listagem
            return $results = $expP->listarExperiencias($idusuario);
        }
    }
?>