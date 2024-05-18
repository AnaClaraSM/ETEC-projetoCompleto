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
    <title>Painel de Administração</title>

    <!-- ❓ VEJA ❔ OS 🤔 EMOJIS 🤨 ABAIXO ! -->
    <style>
        /**/
        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Montserrat", sans-serif;
        }
    </style>
</head>
<body class="w3-light-grey">
    <!-- PHP -->
    <?php
        //Se a sessão não tiver sido iniciada
        if(!isset($_SESSION)) {
            //Cria sessão
            session_start();
        }
    ?>
    <!-- Fim PHP -->

    <!-- Conteúdo Principal / Painel -->
    <div class="w3-padding-large" id="main">
        <!-- Cabeçalho -->
        <header class="w3-container w3-padding-32 w3-center" id="home">
            <br>
            <h1 class="w3-text-white w3-panel w3-cyan w3-round-large">ADMINISTRAÇÃO</h1>
            <h1 class="w3-text-white w3-panel w3-cyan w3-round-large">SISTEMA DE CURRICULOS</h1>
        </header>
        <!-- Fim Cabeçalho -->

        <!-- Formulário de Funções -->
        <form action="../Controller/Navegacao.php" method="post" class="w3-container w3-light-grey w3-text-blue w3-margin w3-center">
            <!-- ❓❓❓❓❓❓❔❔❔❔❔❔🤔🤔🤔🤨🤨🤨!!!!!!!!!! -->
            <!-- Atenção ao nome e valor do input abaixo!!! -->
            <input type="hidden" name="nome_form" value="frmLoginADM">

            <!-- Listar Cadastrados -->
            <button name="btnListarCadastrados" class="w3-button w3-margin w3-blue w3-cell w3-round-large">
                <br>
                <i class="fa-solid fa-users w3-xxlarge"></i>
                <p class="w3-xlarge">Usuários Cadastrados</p> 
            </button>
            <!-- Fim Listar Cadastrados -->
        </form>
        <!-- Fim formulário de Funções -->
    </div>
    <!-- Fim Conteúdo Principal / Painel -->
</body>
</html>