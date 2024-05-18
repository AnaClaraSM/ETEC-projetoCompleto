<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- W3CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Ícones Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Visualizar Cadastro</title>
</head>
<body class="w3-light-grey">
    <!-- PHP -->
    <?php
        //Inclui a classe Usuario da camada Model
        include_once '../Model/Usuario.php';
        //Inclui a classe FormacaoAcadController da camada Controller
        include_once '../Controller/FomacaoAcadController.php';
        //Inclui a classe ExperienciaProfiossionalController da camada Controller
        include_once '../Controller/ExperienciaProfissionalController.php';
        //Inclui classe OutrasFormacoesController da camada Controller
        include_once '../Controller/OutrasFormacoesController.php';

        //Se a sessão não tiver sido iniciada
        if (!isset($_SESSION)) {
            //Cria sessão
            session_start();
        }
    ?>
    <!-- Fim PHP -->

    <!-- Conteúdo Principal -->
    <div class="w3-padding-large" id="main">

        <!-- Cabeçalho -->
        <header class="w3-container w3-padding-32 w3-center">
            <h1 class="w3-text-white w3-panel w3-cyan w3-round-large">
                <!-- Obtém o nome do usuário armazenado na sessão, acessando o método getNome da classe Usuario -->
                <?php echo unserialize($_SESSION['Usuario'])->getNome();?> - Currículo
            </h1>
        </header>
        <!-- Fim Cabeçalho -->

        <!-- Dados Pessoais -->
        <div class="w3-padding-128 w3-content w3-text-grey" style="width: 70%;">
            <!-- Cabeçalho -->
            <h2 class="w3-text-cyan w3-center">Dados Pessoais</h2>
            <!-- Dados -->
            <div>
                <div class="w3-row w3-cyan w3-panel w3-padding w3-round-large w3-text-white w3-xlarge">
                    <!-- Obtém o nome do usuário armazenado na sessão, acessando o método getNome da classe Usuario -->
                    NOME: <?php echo unserialize($_SESSION['Usuario'])->getNome();?>
                </div>
                <div class="w3-row w3-cyan w3-panel w3-padding w3-round-large w3-text-white w3-xlarge">
                    <!-- Obtém o cpf do usuário armazenado na sessão, acessando o método getCPF da classe Usuario -->
                    CPF: <?php echo unserialize($_SESSION['Usuario'])->getCPF();?>
                </div>
                <div class="w3-row w3-cyan w3-panel w3-padding w3-round-large w3-text-white w3-xlarge">
                    <!-- Obtém o email do usuário armazenado na sessão, acessando o método getEmail da classe Usuario -->
                    EMAIL: <?php echo unserialize($_SESSION['Usuario'])->getEmail();?>
                </div>
                <div class="w3-row w3-cyan w3-panel w3-padding w3-round-large w3-text-white w3-xlarge">
                    <!-- Obtém a data de nascimento do usuário armazenado na sessão, acessando o método getDataNascimento da classe Usuario -->
                    DATA DE NASCIMENTO: <?php echo unserialize($_SESSION['Usuario'])->getDataNascimento();?>
                </div>
            </div>
        </div>
        <!-- Fim Dados Pessoais -->

        <!-- Formação Acadêmica -->
        <div class="w3-padding-128 w3-content w3-text-grey" style="width: 70%;">
            <!-- Cabeçalho -->
            <h2 class="w3-text-cyan w3-center">Formação Acadêmica</h2>
            <!-- Tabela -->
            <div class="w3-container w3-center">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center w3-blue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <!-- PHP - Corpo da Tabela -->
                    <tbody>
                        <?php
                            //Cria nova instância da classe FormacaoAcadController
                            $fAcad = new FormacaoAcadController();
                            //Acessa o método gerarLista do objeto (de acordo com o id do usuário (id como parametro), obtido na sessão) e armazena os resultados/registros
                            $results = $fAcad->gerarLista(unserialize($_SESSION['Usuario'])->getID());

                            //Se o resultado não é nulo (se houve retorno de informação)
                            if ($results != null) {
                                //lista os registros conforme os campos da Tabela
                                while($row = $results->fetch_object()) {
                                    echo '<tr>';
                                        echo '<td style="width: 15%;">'.$row->inicio.'</td>';
                                        echo '<td style="width: 15%;">'.$row->fim.'</td>';
                                        echo '<td style="width: 70%;">'.$row->descricao.'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                    <!-- Fim PHP - Corpo da Tabela -->
                </table>
            </div>
            <!-- Fim Tabela -->
        </div>
        <!-- Fim Formação Acadêmica -->

        <!-- Experiência Profissional -->
        <div class="w3-padding-128 w3-content w3-text-grey" style="width: 70%;">
            <!-- Cabeçalho -->
            <h2 class="w3-text-cyan w3-center">Experiência Profissional</h2>
            <!-- Tabela -->
            <div class="w3-container w3-center">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center w3-blue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Empresa</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <!-- PHP - Corpo da Tabela -->
                    <tbody>
                        <?php
                            //Cria nova instância da classe ExperienciaProfiossionalController
                            $ePro = new ExperienciaProfissionalController();
                            //Acessa o método gerarLista do objeto (de acordo com o id do usuário (id como parametro), obtido na sessão) e armazena os resultados/registros
                            $results = $ePro->gerarLista(unserialize($_SESSION['Usuario'])->getID());

                            //Se o resultado não é nulo (se houve retorno de informação)
                            if ($results != null) {
                                //lista os registros conforme os campos da Tabela
                                while($row = $results->fetch_object()) {
                                    echo '<tr>';
                                        echo '<td style="width: 10%;">'.$row->inicio.'</td>';
                                        echo '<td style="width: 10%;">'.$row->fim.'</td>';
                                        echo '<td style="width: 10%;">'.$row->empresa.'</td>';
                                        echo '<td style="width: 70%;">'.$row->descricao.'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                    <!-- Fim PHP - Corpo da Tabela -->
                </table>
            </div>
            <!-- Fim Tabela -->
        </div>
        <!-- Fim Experiência Profissional -->

        <!-- Outras Formações -->
        <div class="w3-padding-128 w3-content w3-text-grey" style="width: 70%;">
            <!-- Cabeçalho -->
            <h2 class="w3-text-cyan w3-center">Outras Formações</h2>
            <!-- Tabela -->
            <div class="w3-container w3-center">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center w3-blue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <!-- PHP - Corpo da Tabela -->
                    <tbody>
                        <?php
                            //Cria nova instância da classe OutrasFormacoesController
                            $oForm = new OutrasFormacoesController();
                            //Acessa o método gerarLista do objeto (de acordo com o id do usuário (id como parametro), obtido na sessão) e armazena os resultados/registros
                            $results = $oForm->gerarLista(unserialize($_SESSION['Usuario'])->getID());

                            //Se o resultado não é nulo (se houve retorno de informação)
                            if ($results != null) {
                                //lista os registros conforme os campos da Tabela
                                while($row = $results->fetch_object()) {
                                    echo '<tr>';
                                        echo '<td style="width: 10%;">'.$row->inicio.'</td>';
                                        echo '<td style="width: 10%;">'.$row->fim.'</td>';
                                        echo '<td style="width: 10%;">'.$row->empresa.'</td>';
                                        echo '<td style="width: 70%;">'.$row->descricao.'</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                    <!-- Fim PHP - Corpo da Tabela -->
                </table>
            </div>
            <!-- Fim Tabela -->
        </div>
        <!-- Fim Experiência Profissional -->

        <!-- Botão Voltar -->
        <div class="w3-padding-128 w3-content w3-text-grey">
            <form action="../Controller/Navegacao.php" method="post" class="w3-container w3-light-grey w3-text-blue w3-margin w3-center" style="width: 30%;">
                <div class="w3-row w3-section">
                    <div>
                        <button name="btnVoltarCadastrados" class="w3-button w3-block w3-margin w3-blue w3-cell w3-round-large" style="width: 90%;">Voltar</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Fim Botão Voltar -->
    </div>
    <!-- Fim Conteúdo Principal -->
</body>
</html>