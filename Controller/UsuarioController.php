<?php

//Se a sessão não tiver sido iniciada
if(!isset($_SESSION)) {
    //Cria sessão
    session_start();
}

//Criação da Classe UsuarioController
class UsuarioController {
    
    //Método inserir
    public function inserir($nome, $cpf, $email, $senha) {
        //Inclui a classe Usuario da camada Model
        require_once "../Model/Usuario.php"
        //Cria uma nova instância da classe Usuario e popula seus atributos
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setCPF($cpf);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        //Persiste os dados do objeto $usuario no BD e armazena o resultado
        $r = $usuario->inserirBD();
        //Serialização do objeto e alocação na sessão
        $_SESSION['Usuario'] = serialize($usuario);
        //Retorna o resultado da inserção
        return $r;
    }

    //Método atualizar
    public function atualizar($id, $nome, $cpf, $email, $dataNascimento) {
        //Inclui a classe Usuario da camada Model
        require_once '../Model/Usuario.php';
        //Cria uma instância da classe Usuario e popula seus atributos
        $usuario = new Usuario();
        $usuario->setId($id);
        $usuario->setNome($nome);
        $usuario->setCPF($cpf);
        $usuario->setEmail($email);
        $usuario->setDataNascimento($dataNascimento);
        //Persiste os dados do objeto $usuario no BD e armazena o resultado
        $r = $usuario->atualizarBD();
        //Serialização do objeto e alocação na sessão
        $_SESSION['Usuario'] = serialize($usuario);
        //Retorna o resultado da atualização
        return $r;
    }
}

?>