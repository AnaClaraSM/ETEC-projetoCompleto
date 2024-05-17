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
            //Inclui a classe FormacaoAcadController da camada Controller
            require_once "../Controller/FormacaoAcadController.php";
            //Inclui a classe Usuario da camada Model
            include_once "../Model/Usuario.php";

            //Cria uma nova instância da classe FormacaoAcadController
            $fAController = new FormacaoAcadController();

            //Verifica se o resultado da inserção (acesso ao método inserir do objeto com o id do usuário e os dados da formação postados através do formulário como parâmetros) foi positivo
            if ($fAController->inserir(
                date("Y-m-d",strtotime($_POST["txtInicioFA"])),
                date("Y-m-d", strtotime($_POST["txtFimFA"])),
                $_POST["txtDescFA"],
                unserialize($_SESSION["Usuario"])->getID()
                ) != false
            ) {
                //Se sim, direciona para a página informacaoInserida
                include_once "../View/informacaoInserida.php";
            }
            else {
                //Se não, direciona para a página operacaoNaoRealizada
                include_once "../View/operacaoNaoRealizada.php";
            }

            break;

        //Excluir Formação Acadêmica
        case isset($_POST["btnExcluirFA"]):
            //Inclui a classe FormacaoAcadController da camada Controller
            require_once "../Controller/FomacaoAcadController.php";
            //Inclui a classe Usuario da camada Model
            include_once "../Model/Usuario.php";

            //Cria uma nova instância da classe FormacaoAcadController
            $fAController = new FormacaoAcadController();

            //Verifica se o resultado da remoção (acesso ao método remover do objeto com o id do resgistro da formação como parâmetro) foi positivo
            if($fAController->remover($_POST["idFA"]) == true) {
                //Se sim, direciona para a página informacaoExcluida
                include_once "../View/informacaoExcluida.php";
            }
            else {
                //Se não, direciona para a página operacaoNaoRealizada
                include_once "../View/operacaoNaoRealizada.php";
            }

            break;

        //Adicionar Experiência Profissional
        case isset($_POST["btnAddEP"]):
            //Inclui a classe ExperienciaProfissionalController da camada Controller
            require_once "../Controller/ExperienciaProfissionalController.php";
            //Inclui a classe Usuario da camada Model
            include_once "../Model/Usuario.php";

            //Cria uma nova instância da classe ExperienciaProfissionalController
            $ePController = new ExperienciaProfissionalController();

            //Verifica se o resultado da inserção (acesso ao método inserir do objeto com o id do usuário e os dados da formação postados através do formulário como parâmetros) foi positivo
            if ($ePController->inserir(
                date("Y-m-d", strtotime($_POST["txtInicioEP"])), 
                date("Y-m-d", strtotime($_POST["txtFimEP"])), 
                $_POST["txtEmpEP"], 
                $_POST["txtDescEP"], 
                unserialize($_SESSION["Usuario"])->getID()
                ) != false
            ) {
                //Se sim, direciona para a página informacaoInserida
                include_once "../View/informacaoInserida.php";
            }
            else {
                //Se não, direciona para a página operacaoNaoRealizada
                include_once "../View/operacaoNaoRealizada.php";
            }

            break;

        //Excluir Experiência Profissional
        case isset ($_POST["btnExcluirEP"]):            
            //Inclui a classe ExperienciaProfissionalController da camada Controller
            require_once "../Controller/ExperienciaProfissionalController.php";
            //Inclui a classe Usuario da camada Model
            include_once "../Model/Usuario.php";

            //Cria uma nova instância da classe ExperienciaProfissionalController
            $ePController = new ExperienciaProfissionalController();

            //Verifica se o resultado da remoção (acesso ao método remover do objeto com o id do resgistro da formação como parâmetro) foi positivo
            if ($epControler->remover($_POST["idEP"]) == true) {
                //Se sim, direciona para a página informacaoExcluida
                include_once "../View/informacaoExcluida.php";
            }
            else {
                //Se não, direciona para a página operacaoNaoRealizada
                include_once "../View/operacaoNaoRealizada.php";
            }

            break;

        //Adicionar em Outras Formações
        case isset($_POST["btnAddOF"]):
            //Inclui a classe OutrasFormacoesController da camada Controller
            require_once "../Controller/OutrasFormacoesController.php";
            //Inclui a classe Usuario da camada Model
            include_once "../Model/Usuario.php";
            //Cria uma nova instância da classe OutrasFormacoesController
            $oFController = new OutrasFormacoesController;
            //Verifica se o resultado da inserção (acesso ao método inserir do objeto com o id do usuário e os dados da formação postados através do formulário como parâmetros) foi positivo
            if ($oFController->inserir(
                date("Y-m-d", strtotime($_POST["txtInicioOF"])),
                date("Y-m-d", strtotime($_POST["txtFimOF"])),
                $_POST["txtDescOF"],
                unserialize($_SESSION["Usuario"])->getID()
            ) != false
            ) {
                //Se sim, direciona para a página informaçãoInserida
                include_once "../View/informacaoInserida.php";
            }
            else {
                //Se não, direciona para a página operacaoNaoRealizada
                include_once "../View/operacaoNaoRealizada.php";
            }

            break;

        //Remover em Outras Formações
        case isset ($_POST["btnExcluirOF"]):
            //Inclui a classe ExperienciaProfissionalController da camada Controller
            require_once "../Controller/OutrasFormacoesController.php";
            ///Inclui a classe Usuario da camada Model
            include_once "../Model/Usuario.php";
            //Cria uma nova instância da classe OutrasFormacoesController
            $oFController = new OutrasFormacoesController();

            //Verifica se o resultado da remoção (acesso ao método remover do objeto com o id do resgistro da formação como parâmetro) foi positivo
            if ($oFController->remover($_POST["idOF"]) == true) {
                //Se sim, direciona para a página informacaoExcluida
                include_once "../View/informacaoExcluida.php";
            }
            else {
                //Se não, direciona para a página operacaoNaoRealizada
                include_once "../View/operacaoNaoRealizada.php";
            }

            break;

        //Módulo Administrativo
        
        //ADM Login (acesso à página de login administrativo)
        case isset($_POST['btnADM']):
            //Direciona para a página de login administrativo
            include_once '../View/ADMLogin.php';

            break;

        //ADM Login (submissão)
        case isset($_POST['btnLoginADM']):
            //Inclui a classe AdministradorController da camada Controller
            require_once '../Controller/AdministradorController.php';

            //Cria uma nova instância da classe AdministradorController 
            $aController = new AdministradorController();

            //Verifica se o resultado do login (acesso ao método login do objeto com o login e a senha do usuário postados através do formulário como parâmetros) foi positivo
            if($aController->login($_POST['txtLoginADM'], $_POST['txtSenhaADM'])) {
                //Se sim, direciona para a página ADMPrincipal
                include_once '../View/ADMPrincipal.php';
            }
            else {
            }

            break;

        //Listar Cadastrados
        case isset($_POST['btnListarCadastrados']):
            //Direciona para a página ADMListarCadastrados
            include_once '../View/ADMListarCadastrados.php';

            break;

        //Voltar
        case isset($_POST['btnVoltar']):
            //Direciona à página ADMPrincipal
            include_once '../View/ADMPrincipal.php';

            break;

    }
?>