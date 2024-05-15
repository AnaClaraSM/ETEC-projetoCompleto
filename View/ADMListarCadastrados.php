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
            //Se a sessão não tiver sido iniciada
            if (!isset($_SESSION)) {
                //Cria sessão
                session_start();
            }
        ?>    
    <!-- Fim PHP -->

    <!-- Cabeçalho -->
    <header class="w3-container w3-padding w3-center">
        <h1 class="w3-text-white w3-panel w3-cyan w3-round-large">Lista de Usuários Cadastrados no Sistema</h1>
    </header>
    <!-- Fim Cabeçalho -->
    <!-- Tab -->
</body>
</html>