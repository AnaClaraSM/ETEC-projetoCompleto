<?php

// Classe OutrasFormacoes
Class OutrasFormacoes {

    // Atributos
    private $id;
    private $idusuario;
    private $inicio;
    private $fim;
    private $descricao;


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

    //ID Usuário
    public function setIdUsuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }
    public function getIdUsuario()
    {
        return $this->idusuario;
    }
    
    //Início
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;
    }
    public function getInicio()
    {
        return $this->inicio;
    }

    //Fim
    public function setFim($fim)
    {
        $this->fim = $fim;
    }
    public function getFim()
    {
        return $this->fim;
    }

    //Descrição
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getDescricao()
    {
        return $this->descricao;
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

        //Insere um novo registro na tabela outrasformacoes
        $sql = "INSERT INTO outrasformacoes (idusuario, inicio, fim, descricao) VALUES ('".$this->idusuario."', '".$this->inicio."', '".$this->fim."', '".$this->descricao."')";

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

    //excluirBD
    public function excluirBD ($id)
    {
        require_once 'ConexaoBD.php';

        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        //Deleta o registro da tabela outrasformacoes em que o valor do campo id é igual ao valor informado (parâmetro $id)
        $sql = "DELETE FROM outrasformacoes WHERE idoutrasformacoes = '".$id ."';";

        if ($conn->query($sql) === TRUE) {

            $conn->close();
            return TRUE;
        }
        else {
            $conn->close();
            return FALSE;
        }
    }

    //listarFormacoes
    public function listarOutrasFormacoes ($idusuario)
    {
        require_once 'ConexaoBD.php';

        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        //Recupera os registros da tabela outrasformacoes em que o valor do campo idusuário é igual ao valor informado (parâmetro $idusuario)
        $sql = "SELECT * FROM outrasformacoes WHERE idusuario = '".$idusuario."'";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }
}

?>