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
            
            //Cria nova instância

            //Popula atributos

            //Persiste dados e armazena resultado

            //Retorna resultado
        }

        //Método Gerar Lista
        //Recebe o id do usuário como parâmetro
    }

?>