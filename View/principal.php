<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- W3CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Ícones Font Awesome v6.5.2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Enlatados Juarez</title>

    <style>
        /*sidebar terá uma largura de 120px e cor a cor de fundo #222*/
        .w3-sidebar {
            width: 120px;
            /* background-color: #222; */
        }

        /**/
        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Montserrat", sans-serif;
        }
    </style>
</head>
<body class="w3-light-grey">
    <!-- PHP -->
    <?php
        //Inclui a classe Usuario da camada Model
        include_once '../Model/Usuario.php';
        //Se a sessão não tiver sido iniciada
        if(!isset($_SESSION)) {
            //Cria sessão
            session_start();
        }
    ?>
    <!-- Fim PHP -->

    <!-- Sidebar -->
    <nav class="w3-sidebar w3-bar-block w3-center w3-blue">
        <!-- Botão Home -->
        <a href="#home"
            class="w3-bar-item w3-button w3-block w3-cell w3-hover-light w3-hover-text-cyan w3-text-light-grey">
            <i class="fa-solid fa-home w3-xxlarge"></i>
            <p>HOME</p>
        </a>
        <!-- Botão Dados Pessoais -->
        <a href="#dPessoais"
            class="w3-bar-item w3-button w3-block w3-cell w3-hover-light w3-hover-text-cyan w3-text-light-grey">
            <i class="fa-solid fa-address-book w3-xxlarge"></i>
            <p>Dados Pessoais</p>
        </a>
        <!-- Botão Formação -->
        <a href="#formacao"
            class="w3-bar-item w3-button w3-block w3-cell w3-hover-light w3-hover-text-cyan w3-text-light-grey">
            <i class="fa-solid fa-graduation-cap w3-xxlarge"></i>
            <p>Formação Acadêmica</p>
        </a>
        <!-- Botão Experiência Profissional -->
        <a href="#eProfissional"
            class="w3-bar-item w3-button w3-block w3-cell w3-hover-light w3-hover-text-cyan w3-text-light-grey">
            <i class="fa-solid fa-briefcase w3-xxlarge"></i>
            <p>Experiência Profissional</p>
        </a>
        <!-- Botão Formação -->
        <a href="#outrasFormacoes"
            class="w3-bar-item w3-button w3-block w3-cell w3-hover-light w3-hover-text-cyan w3-text-light-grey">
            <i class="fa-solid fa-certificate w3-xxlarge"></i>
            <p>Outras Formações</p>
        </a>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="w3-padding-large" id="main">
        <!-- Seção Home -->
        <header class="w3-container w3-padding-32 w3-center" id="home">
            <h1>
                <img src="../Img/Enlatados.png" alt="Logo" class="w3-image" width="50%">
                <br>
            </h1>
            <a href="https://www.freepik.com" class="w3-text-cyan">Designed by brgfx / Feepik</a>
            <br>
            <h1 class="w3-text-cyan">SISTEMA DE CURRICULOS</h1>
        </header>
        <!-- Fim Seção Home -->

        <!-- Seção Dados Pessoais -->
        <div class="w3-padding-128 w3-content w3-text-grey" id="dPessoais">
            <!-- Cabeçalho -->
            <h2 class="w3-text-cyan">Dados Pessoais</h2>
            <!-- Formulário -->
            <form action="../Controller/Navegacao.php" method="post"
                class="w3-row w3-light-grey w3-text-blue w3-margin" style="width:70%">
                <!-- ID - Não visível ao usuário -->
                <input class="w3-input w3-border w3-round-large" name="txtID" type="hidden" value="<?php echo unserialize($_SESSION['Usuario'])->getID();?>">
                <!-- Nome -->
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width: 11%;">
                        <i class="w3-xxlarge fa-solid fa-user"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtNome" type="text" placeholder="Nome Completo" value="<?php echo unserialize($_SESSION['Usuario'])->getNome();?>">
                    </div>
                </div>
                <!-- CPF -->
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width: 11%;">
                        <i class="w3-xxlarge fa fa-drivers-license"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtCPF" type="text" placeholder="CPF:  33333333333" value="<?php echo unserialize($_SESSION['Usuario'])->getCPF();?>">
                    </div>
                </div>
                <!-- Data -->
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width: 11%;">
                        <i class="w3-xxlarge fa-regular fa-calendar-days"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtEmail" type="date" value="<?php echo unserialize($_SESSION['Usuario'])->getDataNascimento;?>">
                    </div>
                </div>
                <!-- Email -->
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width: 11%;">
                        <i class="w3-xxlarge fa-solid fa-envelope"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtEmail" type="text" placeholder="Email" value="<?php echo unserialize($_SESSION['Usuario'])->getEmail();?>">
                    </div>
                </div>
                <!-- Botão de Cadastro -->
                <div class="w3-row w3-section">
                    <div class="w3-center">
                        <button name="btnAtualizar" class="w3-button w3-block w3-margin w3-blue w3-cell w3-round-large" style="width: 90%;">Atualizar</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Fim Seção Dados Pessoais -->

        <!-- Seção Formação Acadêmica -->
        <div class="w3-padding-128 w3-content w3-text-grey" id="formacao">
            <!-- Cabeçalho -->
            <h2 class="w3-text-cyan">Formação Acadêmica</h2>
            <!-- Formulário -->
            <form action="" method="post"
                class="w3-row w3-light-grey w3-text-blue w3-margin" style="width:70%">
                <div class="w3-row w3-center">
                    <div class="w3-col" style="width: 50%;">
                        Data Inicial
                    </div>
                    <div class="w3-rest"><!--RES ???-->
                        Data Final
                    </div>
                </div>
                <!-- Campo Data Inicial -->
                <div class="w3-row w3-section">
                    <div class="w3-row w3-section w3-col" style="width: 45%;">
                        <div class="w3-col" style="width: 15%;">
                            <i class="w3-xxlarge fa-regular fa-calendar-days"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtInicioFA" type="date">
                        </div>
                    </div>
                    <!-- Campo Data Final -->
                    <div class="w3-row w3-section w3-rest">
                        <div class="w3-col w3-margin-left" style="width: 13%;">
                            <i class="w3-xxlarge fa-regular fa-calendar-days"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtFimFA" type="date">
                        </div>
                    </div>
                </div>
                <!-- Campo Descrição -->
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width: 7%;">
                        <i class="w3-xxlarge fa-solid fa-align-justify"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtDescFA" type="text" placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Sistemas - Centro Paula Souza">
                    </div>
                </div>
                <!-- Botão Adicionar -->
                <div class="w3-row w3-section">
                    <div class="w3-center">
                        <button name="btnAddFormacao" class="w3-button w3-block w3-blue w3-cell w3-round-large" style="width: 20%;">
                            <i class="w3-xxlarge fa-solid fa-user-plus"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Fim Formulário -->
            <!-- Tabela -->
            <div class="w3-container w3-center" style="width: 70%;">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center w3-blue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <!-- PHP - Corpo da Tabela -->
                    <tbody>
                        <?php
                        $fAcad = new FormacaoAcademicaController();
                        $results = $fAcad->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                        
                        if($results != null) {
                            while($row = $results->fetch_object()) {
                                echo '<tr>';
                                echo '<td style="width: 15%">'.$row->inicio.'</td>';
                                echo '<td style="width: 15%">'.$row->fim.'</td>';
                                echo '<td style="width: 65%">'.$row->descrição.'</td>';
                                echo '<td style="width: 5%"><form action="/Controller/Navegacao.php" method="post"><input type="hidden" name="idFA" value="'.$row->idformacaoacademica.'"><button name="btnExcluirFA" class="w3-button w3-block w3-blue w3-cell w3-round-large"><i class="fa-solid fa-user-times"></i></td></form>';
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
        <!-- Fim Seção Formação Acadêmica -->
        <br>

        <!-- Seção Experiência Profissional -->
        <div class="w3-padding-128 w3-content w3-text-grey" id="eProfissional">
            <!-- Cabeçalho -->
            <h2 class="w3-text-cyan">Experiência Profissional</h2>
            <!-- Formulário -->
            <form action="" method="post" class="w3-row w3-light-grey w3-text-blue w3-margin" style="width: 70%;">
                <!--  -->
                <div class="w3-row w3-center">
                    <div class="w3-col" style="width: 50%;">
                        Data Inicial
                    </div>
                    <div class="w3-rest">
                        Data Final
                    </div>
                </div>
                <!-- Campo Data Inicial -->
                <div class="w3-row w3-section">
                    <div class="w3-row w3-section w3-col" style="width: 45%;">
                        <div class="w3-col" style="width: 15%;">
                            <i class="w3-xxlarge fa-regular fa-calendar-days"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" type="date" name="txtInicioEP">
                        </div>                           
                    </div>
                    <!-- Campo Data Final -->
                    <div class="w3-row w3-section w3-rest">
                        <div class="w3-col w3-margin-left" style="width: 13%;">
                            <i class="w3-xxlarge fa-regular fa-calendar-days"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtFimEP" type="date">
                        </div>
                    </div>
                </div>
                <!-- Campo Empresa -->
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width: 7%;">
                        <i class="w3-xxlarge fa-regular fa-building"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtEmpEP" type="text" placeholder="Centro Paula Souza">
                    </div>
                </div>                    
                <!-- Campo Descrição -->
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width: 7%;">
                        <i class="w3-xxlarge fa-solid fa-align-justify"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtDescEP" type="text" placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Sistemas - Desenvolvimento de Páginas WEB">
                    </div>
                </div>
                <!-- Botão Adicionar -->
                <div class="w3-row w3-section">
                    <div class="w3-center">
                        <button name="btnAddEP" class="w3-button w3-block w3-blue w3-cell w3-round-large" style="width: 20%;">
                            <i class="w3-xxlarge fa-solid fa-user-plus"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Fim Formulário -->
            <!-- Tabela -->
            <div class="w3-container w3-center" style="width: 70%;">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center w3-blue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Empresa</th>
                            <th>Descrição</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <!-- PHP - Corpo da Tabela -->
                    <tbody>
                        <?php
                        $ePro = new ExperienciaProfissionalController();
                        $results = $ePro->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                        
                        if($results != null) {
                            while($row = $results->fetch_object()) {
                                    echo '<tr>';
                                    echo '<td style="width: 10%">'.$row->inicio.'</td>';
                                    echo '<td style="width: 10%">'.$row->fim.'</td>';
                                    echo '<td style="width: 10%">'.$row->empresa.'</td>';
                                    echo '<td style="width: 65%">'.$row->descrição.'</td>';
                                    echo '<td style="width: 5%"><form action="/Controller/Navegacao.php" method="post"><input type="hidden" name="idEP" value="'.$row->idexperienciaprofissional.'"><button name="btnExcluirEP" class="w3-button w3-block w3-blue w3-cell w3-round-large"><i class="fa-solid fa-user-times"></i></td></form>';
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
        <!-- Fim Seção Experiência Profissional -->
        <br>

        <!-- Seção Outras Formações -->
        <div class="w3-padding-128 w3-content w3-text-grey" id="outrasFormacoes">
            <!-- Cabeçalho -->
            <h2 class="w3-text-cyan">Outras Formações</h2>
            <!-- Formulário -->
            <form action="" method="post" class="w3-row w3-light-grey w3-text-blue w3-margin" style="width: 70%;">
                <!--  -->
                <div class="w3-row w3-center">
                    <div class="w3-col" style="width: 50%;">
                        Data Inicial
                    </div>
                    <div class="w3-rest">
                        Data Final
                    </div>
                </div>
                <!-- Campo Data Inicial -->
                <div class="w3-row w3-section">
                    <div class="w3-row w3-section w3-col" style="width: 45%;">
                        <div class="w3-col" style="width: 15%;">
                            <i class="w3-xxlarge fa-regular fa-calendar-days"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtInicioOF" type="date">
                        </div>
                    </div>
                    <!-- Campo Data Final -->
                    <div class="w3-row w3-section w3-rest">
                        <div class="w3-col w3-margin-left" style="width: 13%;">
                            <i class="w3-xxlarge fa-regular fa-calendar-days"></i>
                        </div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border w3-round-large" name="txtFimOF" type="date">
                        </div>
                    </div>
                </div>
                <!-- Campo Descrição -->
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width: 7%;">
                        <i class="w3-xxlarge fa-solid fa-align-justify"></i>
                    </div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-round-large" name="txtDescOF" type="text" placeholder="Ex: Curso de Inglês - Inglês City">
                    </div>
                </div>
                <!-- Botão Adicionar -->
                <div class="w3-row w3-section">
                    <div class="w3-center">
                        <button name="btnAddOF" class="w3-button w3-block w3-blue w3-cell w3-round-large" style="width: 20%;">
                            <i class="w3-xxlarge fa-solid fa-user-plus"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Fim Formulário -->
            <!-- Tabela -->
            <div class="w3-container w3-center" style="width: 70%">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center w3-blue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <!-- PHP - Corpo da Tabela -->
                    <tbody>
                        <?php
                        $oForm = new OutrasFormacoesController();
                        $results = $oForm->gerarLista(unserialize($_SESSION['Usuario'])->getID());

                        if($results != null) {
                            while($row = $results->fetch_object()) {
                                echo '<tr>';
                                echo '<td style="width: 15%;">'.$row->inicio.'</td>';
                                echo '<td style="width: 15%;">'.$row->fim.'</td>';
                                echo '<td style="width: 65%;">'.$row->descricao.'</td>';
                                echo '<td style="width: 5%;"><form action="/Controller/Navegacao.php" method="post"><input type="hidden" name="idOF" value="'.$row->idoutrasformacoes.'"><button name="btnExcluirOF" class="w3-button w3-block w3-blue w3-cell w3-round-large"><i class="fa-solid fa-user-times"></i></button></td></form>';
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
        <!-- Fim Seção Outras Formações -->
    </div>
    <!-- Fim Conteúdo Principal -->
</body>

</html>