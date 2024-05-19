<?php

// Classe Usuario
Class Usuario{

    // Atributos
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $dataNascimento;
    private $senha;


    // Métodos
    
    // Setters / Getters

    //ID
    public function setID($id)
    {
        $this->id = $id;
    }
    public function getID()
    {
        return $this->id;
    }
    
    //Nome
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }

    //CPF
    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getCPF()
    {
        return $this->cpf;
    }

    //Email
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    //Data de Nascimento
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    //Senha
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function getSenha()
    {
        return $this->senha;
    }


    // Métodos Específicos

    //inserirBD
    public function inserirBD ()
    {
        require_once 'ConexaoBD.php';

        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
        $sql = "INSERT INTO usuario (nome, cpf, email, senha) VALUES ('".$this->nome."', '".$this->cpf."', '".$this->email."', '".$this->senha."')";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
        }
        else {
            $conn->close();
            return FALSE;
        }
    }

    //carregarUsuario
    public function carregarUsuario ($cpf)
    {
        require_once 'ConexaoBD.php';

        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
        // Apresenta as informações do usuário com aquele cpf (parâmetro $cpf)
        $sql = "SELECT * FROM usuario WHERE cpf = ".$cpf;
        $re = $conn->query($sql);
        $r = $re->fetch_object();

        if ($r != null) 
        {
            $this->id = $r->idusuario;
            $this->nome = $r->nome;
            $this->email = $r->email;
            $this->cpf = $r->cpf;
            $this->dataNascimento = $r->dataNascimento;
            $this->senha = $r->senha;
            $conn->close();
            return TRUE;
        }
        else {
            $conn->close();
            return FALSE;
        }
    }

    //atualizarBD
    public function atualizarBD ()
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        // Atualiza as informações do usuário com aquele id
        $sql = "UPDATE usuario SET nome = '".$this->nome. "', cpf = '".$this->cpf."', dataNascimento = '".$this->dataNascimento."', email='".$this->email."' WHERE idusuario ='".$this->id."'";

        if ($conn->query($sql) === TRUE)
        {
            $conn->close();
            return TRUE;
        }
        else {
            $conn->close();
            return FALSE;
        }
    }

    //listaCadastrados
    public function listaCadastrados() {
        //Inclui Classe ConexoBD
        require_once 'ConexaoBD.php';

        //Cria nova instância do objeto da Classe ConexaoBD
        $con = new ConexaoBD();
        //Conexão com banco de dados
        $conn = $con->conectar();
        //Verifica resultado da conexão
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        //Sentença sql -> recupera id e nome dos usuários -> lista todos os usuários
        $sql = "SELECT idusuario, nome FROM usuario;";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }

    //obterDados
    //Recupera os dados de um usuário específico
    public function obterDados($id) {
        //Inclui a classe ConexaoBD
        require_once 'ConexaoBD.php';

        //Cria nova instância do objeto ConexaoBD
        $con = new ConexaoBD();
        //Conexão com o banco de dados (acesso ao método conectar do objeto) e armazenamento do resultado
        $conn = $con->conectar();
        //Verifica se houve erro na conexão
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        //Sentença sql -> recupera todos os dados do usuário cujo id é igual ao informado (passado como parâmetro)
        $sql = "SELECT * FROM usuario WHERE idusuario = ".$id.";";
        //Na conexão com o banco de dados, acessa o método de consulta com a sentença sql como parâmetro - Executa a sentença/consulta e armazena o resultado retornado
        $re = $conn->query($sql);
        //Fecha a conexão
        $conn->close();
        //Retorna o resultado da consulta (os dados encontrados)
        return $re;
    }
}

?>