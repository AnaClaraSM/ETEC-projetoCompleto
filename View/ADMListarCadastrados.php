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
    <title>Usuários Cadastrados</title>
</head>
<body class="w3-light-grey">
    <!-- PHP -->
    <?php
        //Inclui a classe Usuario da camada Model
        include_once '../Model/Usuario.php';
        //Inclui a classe UsuarioController da camada Controller
        include_once '../Controller/UsuarioController.php';

        //Se a sessão não tiver sido iniciada
        if (!isset($_SESSION)) {
            //Cria sessão
            session_start();
        }
    ?>    
    <!-- Fim PHP -->

    <!-- Cabeçalho -->
    <header class="w3-container w3-padding-32 w3-center">
        <h1 class="w3-text-white w3-panel w3-cyan w3-round-large">Lista de Usuários Cadastrados no Sistema</h1>
    </header>
    <!-- Fim Cabeçalho -->
    <!-- Tabela de Usuários Cadastrados -->
    <div class="w3-padding-128 w3-content w3-text-grey">
        <div class="w3-container">
            <table class="w3-table-all w3-centered">
                <thead>
                    <tr class="w3-center w3-blue">
                        <th>Código</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <!-- PHP - Corpo da Tabela -->
                <tbody>
                    <?php
                        $usuario = new UsuarioController();
                        $results = $usuario->gerarLista();
                        if($results != null) {
                            while($row = $results->fetch_object()) {
                                echo '<tr>';
                                echo '<td style="width: 1%;">'.$row->idusuario.'</td>';
                                echo '<td style="width: 50%;">'.$row->nome.'</td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
                <!-- Fim PHP - Corpo da Tabela -->
            </table>
        </div>
    </div>
    <!-- Fim Tabela de Usuários Cadastrados -->
    <!-- Botão Voltar-->
    <div class="w3-padding-128 w3-content w3-text-grey">
        <form action="../Controller/Navegacao.php" method="post" class="w3-container w3-light-grey w3-text-blue w3-margin w3-center" style="width: 30%">
            <div class="w3-row w3-section">
                <div>
                    <button name="btnVoltar" class="w3-button w3-block w3-margin w3-blue w3-cell w3-round-large" style="width: 90%;">Voltar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Fim Botão Voltar-->
</body>
</html>