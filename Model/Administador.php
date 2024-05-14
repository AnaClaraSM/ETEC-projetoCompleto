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

        //Outros Métodos

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
    }
?>