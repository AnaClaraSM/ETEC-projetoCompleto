<?php

    //Se a sessão não tiver sido iniciada
    if (!isset ($_SESSION)) {
        //Cria sessão
        session_start();
    }

    //Criação da Classe FormacaoAcadController
    class FormacaoAcadController {

        //Método Inserir
        //Recebe os dados da formação e o id do usuário como parâmetros
        public function inserir($inicio, $fim, $descricao, $idusuario) {
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
        //Recebe o id da formacao como parâmetro
        public function remover($id) {
            //Inclui a classe FormacaoAcad da camada Model
            require_once '../Model/FormacaoAcad.php';
            //Cria uma nova instância da classe
            $formacao = new FormacaoAcad();
            //Acessa o método excluirBD do objeto com $id como parâmetro (exclusão do registro conforme seu id) e armazena o resultado
            $r = $formacao->excluirBD($id);
            //Retorna o resultado da exclusão
            return $r;
        }

        //Método Gerar Lista
        public function gerarLista($idusuario) {
            //Inclui a classe FormacaoAcad da camada Model
            require_once '../Model/FormacaoAcad.php';
            $formacao = new FormacaoAcad();

            return $results = $formacao->listarFormacoes($idusuario);
        }
    }
?>