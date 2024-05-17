<?php
    //Criação da classe
    class Administrador {
        private $id;
        private $nome;
        private $cpf;
        private $senha;

        //Métodos Setters / Getters

        //ID
        public function setID ($id) 
        {
            $this->id = $id;
        }
        public function getID () 
        {
            return $this->id;
        }

        //Nome
        public function setNome ($nome) 
        {
            $this->nome = $nome;
        }
        public function getNome () 
        {
            return $this->nome;
        }

        //CPF
        public function setCPF ($cpf) 
        {
            $this->cpf = $cpf;
        }
        public function getCPF () 
        {
            return $this->cpf;
        }

        //Senha
        public function setSenha ($senha) 
        {
            $this->senha = $senha;
        }
        public function getSenha ()
        {
            return $this->senha;
        }

        // Métodos Específicos

        //carregarAdministrador
        public function carregarAdministrador($cpf) {

            require_once 'ConexaoBD.php';

            $con = new ConexaoBD();
            $conn = $con->conectar();
            if ($conn->connect_error) {
                die("Connection faied: ". $conn->connect_error);
            }

            //Armazena a sentença sql e verifica o resultado da consulta
            //Recuperar todos os dados da tabela administrador em que o cpf for igual ao informado (parâmetro da função)
            $sql = "SELECT * FROM administrador WHERE cpf = ".$cpf;
            $re = $conn->query($sql);
            $r = $re->fetch_object();
            if($r != null) {
                //Positivo: popula os dados do objeto com os dados do resultado da consulta
                $this->id = $r->idadministrador;
                $this->nome = $r->nome;
                $this->cpf = $r->cpf;
                $this->senha = $r->senha;
                $conn->close();
                return true;
            }
            else {
                $conn->close();
                return false;
            }
        }

        //listaAdministradores
        public function listaAdministradores() {
            //Inclui a classe ConexaoBD
            require_once 'ConexaoBD.php';

            //Cria nova instância do objeto ConexaoBD
            $con = new ConexaoBD();
            //Conexão com o banco de dados (acesso ao método conectar do objeto) e armazenamento do resultado
            $conn = $con->conectar();
            //Verifica se houve erro na conexão
            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
            }

            //Sentença sql -> recupera id, cpf e nome dos administradores -> lista todos os administradores cadastrados
            $sql = "SELECT idadministrador, nome, cpf FROM administrador;";
            //Na conexão com o banco de dados, acessa o método de consulta com a sentença sql como parâmetro - Executa a sentença/consulta e armazena o resultado retornado
            $re = $conn->query($sql);
            //Fecha a conexão
            $conn->close();
            //Retorna o resultado da consulta (os registros encontrados)
            return $re;
        }
    }
?>