<?php

    //Se a sessão não tiver sido iniciada
    if(!isset($_SESSION)) {
        //Cria sessão
        session_start();
    }

    switch($_POST){
        //Nada postado (variável nula) -> mostrar tela de login
        case isset($_POST[null]):
            include_once "View/login.php";
            break;

        //Primeiro Acesso
        case isset($_POST["btnPrimeiroAcesso"]):
            include_once "../View/primeiroAcesso.php";
            break;

        //Cadastrar
        case isset($_POST["btnCadastrar"]):
            require_once "../Controller/UsuarioController.php";
            $uController = new UsuarioController();

            if ($uController->inserir (
                $_POST["txtNome"],
                $_POST["txtCPF"],
                $_POST["txtEmail"],
                $_POST["txtSenha"]
                )
            )
            {
                include_once "../View/cadastroRealizado.php";                
            }
            else {
                include_once "../View/cadastroNaoRealizado.php";
            }

            break;
        
        //Atualizar
        case isset($_POST["btnAtualizar"]):
            require_once "../Controller/UsuarioController.php";

            $uController = new UsuarioController();

            if ($uController->atualizar (
                    $_POST["txtID"],
                    $_POST["txtNome"],
                    $_POST["txtCPF"],
                    $_POST["txtEmail"],
                    date("Y-m-d", strtotime($_POST["txtData"]))
                )
            )
            {
                include_once "../View/atualizacaoRealizada.php";
            }
            else {
                include_once "../View/atualizacaoNaoRealizada.php";
            }

            break;

        //Login
        case isset($_POST["btnLogin"]):
            require_once "../Controller/UsuarioController.php";

            $uController = new UsuarioController();

            //Se o login foi realizado com sucesso
            if ($uController->login($_POST["txtLogin"], $_POST["txtSenha"])) {
                //Direciona à página principal
                include_once "../View/principal.php";
            }
            //Do contrário
            else {
                //Direciona à página cadastroNaoRealizado
                include_once "../View/cadastroNaoRealizado.php";
            }

            break;
        
        //Adicionar Formação Acadêmica
        case isset($_POST["btnAddFormacao"]):
            require_once "../Controller/FormacaoAcadController.php";
            include_once "../Model/Usuario.php"

            $fController = new FormacaoAcadController();

            if ($fController->inserir(
                date("Y-m-d",strtotime($_POST["txtInicioFA"])),
                date("Y-m-d", strtotime($_POST["txtFimFA"])),
                $_POST["txtDescFA"],
                unserialize($_SESSION["Usuario"])->getID()
                ) != false
            ) {
                include_once "../View/cadastroRealizado.php";
            }
            else {
                include_once "../View/cadastroNaoRealizado.php";
            }

            break;
    }
?>