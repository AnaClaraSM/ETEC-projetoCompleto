<?php

    //Se a sessão não tiver sido iniciada
    if (!isset ($_SESSION)) {
        //Cria sessão
        session_start();
    }

    //Criação da Classe FormacaoAcadController
    class FormacaoAcadController {

        //Método Inserir
        public function inserir($inicio, $fim, $descricao $idusuario) {
            //Inclui a classe FormacaoAcad da camada Model
            require_once '../Model/FormacaoAcad.php';
            //Cria uma nova instância da classe FormacaoAcad e popula seus atributos
            $formacao = new FormacaoAcad();
            $formacao->setInicio($inicio);
            $formacao->setFim($fim);
            $formacao->setDescricao($descricao);
            $formacao->setIdUsuario($idusuario);
            //Persiste os dados do objeto $formacao no BD e armazena o resultado
            $r = $formacao->inserirBD();
            //Retorna o resultado da inserção
            return $r;
        }

        //Método Remover
        public function remover($id) {
            //Inclui a classe FormacaoAcad da camada Model
            require_once '../Model/FormacaoAcad.php';
            $formacao = new FormacaoAcad();
            $r = $formacao->excluirBD($id);
            //Retorna o resultado da exclusão
            return $r;
        }

        //Método Gerar Lista
        public function gerarLista($idusuario) {
            //Inclui a classe FormacaoAcad da camada Model
            require_once '../Model/FormacaoAcad.php';
            $formacao = new FormacaoAcad();

            return $results = formacao->listaFormacoes($idusuario);
        }
    }
?>