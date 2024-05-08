<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- W3CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Ícones Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Primeiro Acesso</title>
</head>
<body>
    <!-- Formulário de Cadastro -->
    <form action="../Controller/Navegacao.php" method="post" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin w3-display-middle" style="width:30%">

        <!-- Cabeçalho -->
        <h2 class="w3-center">Primeiro Acesso</h2>

        <!-- Nome -->
        <div class="w3-row w3-section">
            <div class="w3-col" style="width: 11%;">
                <i class="w3-xxlarge fa fa-user"></i>
            </div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="txtNome" type="text" placeholder="Nome Completo">
            </div>
        </div>

        <!-- CPF -->
        <div class="w3-row w3-section">
            <div class="w3-col" style="width: 11%;">
                <i class="w3-xxlarge fa fa-drivers-license"></i>
            </div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="txtCPF" type="text" placeholder="CPF:  33333333333">
            </div>
        </div>

        <!-- Email -->
        <div class="w3-row w3-section">
            <div class="w3-col" style="width: 11%;">
                <i class="w3-xxlarge fa-solid fa-envelope"></i>
            </div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="txtEmail" type="text" placeholder="Email">
            </div>
        </div>

        <!-- Senha -->
        <div class="w3-row w3-section">
            <div class="w3-col" style="width: 11%;">
                <i class="w3-xxlarge fa fa-lock"></i>
            </div>
            <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="txtSenha" type="password" placeholder="Senha">
            </div>
        </div>

        <!-- Botão de Cadastro -->
        <div class="w3-row w3-section">
            <div class="w3-half">
                <button name="btnCadastrar" class="w3-button w3-block w3-margin w3-blue w3-cell w3-round-large" style="width: 90%;">Cadastrar</button>
            </div>
        </div>  
    </form>
</body>
</html>