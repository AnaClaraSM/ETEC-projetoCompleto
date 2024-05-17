<?php
    //Se a sessão não tiver sido iniciada
    if (!isset($_SESSION)) {
        //Cria sessão
        session_start();
    }

    //Criação da classe AdministradorController
    class AdministradorController {

        //Método Login
        //Recebe os dados do cpf e da senha do administrador como parâmetros
        public function login($cpf, $senha) {

            //Inclui classe Administador da camada Model
            require_once '../Model/Administador.php';

            //Cria uma nova instância da classe Administrador
            $administrador = new Administrador();

            //Acessa o método carregarAdministrador do objeto utilizando o cpf passado como parâmetro - carrega o administrador que possui aquele cpf
            $administrador->carregarAdministrador($cpf);

            //Verifica se a senha informada como parâmetro confere com a senha do administrador encontrado para aquele cpf (recuperada pelo acesso ao método getSenha do objeto)
            if($administrador->getSenha() == $senha) {
                //Se sim, serializa o objeto e o aloca na sessão
                $_SESSION['Administrador'] = serialize($administrador);
                return true;
            }
            else {
                return false;
            }
        }

        //Método gerarLista
        public function gerarLista() {
            //Inclui a classe Administrador da camada Model
            require_once '../Model/Administrador.php';

            //Cria nova instância da classe Administrador 
            $a = new Administrador();

            //Acessa o método listaAdministradores do objeto, armazena os resultados e retorna - lista todos os administradores através do método específico
            return $results = $a->listaAdministradores();
        }
    }
?>