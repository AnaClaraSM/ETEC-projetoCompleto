<?php

// Classe
Class ConexaoBD{
    // Atributos
    private $serverName = 'localhost';
    private $userName = 'root';
    private $password = '*Abc123*';
    private $dbName = 'projeto_final';

    // Métodos
    public function conectar()
    {
        // Cria conexão com o banco de dados de acordo com seus atributos
        $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        return $conn; //Retorna resultado da conexão (variável $conn)
    }
}

?>