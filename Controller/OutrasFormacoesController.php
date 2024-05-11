<?php

    //Se a sessão não tiver sido iniciada
    if (!isset($_SESSION)) {
        //Cria sessão
        session_start();
    }

    //Criação da classe OutrasFormacoesController
    class OutrasFormacoesController {

        //Método Inserir
        //Recebe os dados da formação e o id do usuário como parâmetros
        public function inserir ($inicio, $fim, $descricao, $idusuario) {
            //Inclui a classe OutrasFormações da camada Model
            require_once "../Model/OutrasFormacoes.php";
            //Cria uma nova instância da classe OutrasFormações
            $oForm = new OutrasFormacoes();
            //Popula seus atributos
            $oForm->setInicio($inicio);
            $oForm->setFim($fim);
            $oForm->setDescricao($descricao);
            $oForm->setID($idusuario);
            //Persiste os dados do objeto $oForm no BD e armazena o resultado
            $r = $oForm->inserirBD();
            //Retorna o resultado da inserção
            return $r;
        }

        //Método Remover
        //Recebe o id do registro da formação como parâmetro
        public function remover($id) {
            //Inclui a classe OutrasFormações da camada Model
            require_once "../Model/OutrasFormacoes.php";            
            //Cria nova instância da classe
            $oForm = new OutrasFormacoes();
            //Acessa o método excluirBD do objeto com o $id como parâmetro (exclusão registro conforme seu id) e armazena o resultado
            $r = $oForm->excluirBD($id);

            //Retorna resultado da exclusão
            return $r;
        }

        //Método Gerar Lista
        //Recebe o id do usuário como parâmetro
        public function gerarLista($idusuario) {
            //Inclui a classe OutrasFormações da camada Model
            require_once "../Model/OutrasFormacoes.php";
            ///Cria uma nova instância da classe OutrasFormações
            $oForm = new OutrasFormacoes();
            //Acessa o método listarOutrasFormacoes com $idusuario como parâmetro (lista as experiências conforme o id do usuário), armazena e retorna os resultados da listagem
            return $results = $oForm->listarOutrasFormacoes($idusuario);
        }
    }

?>