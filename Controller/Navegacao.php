<?php
    switch($_POST){
        //Nada postado (variável nula) -> mostrar tela de login
        case isset($_POST[null]):
            include_once "View/login.php";
            break;

        //Primeiro Acesso
        case isset($_POST["btnPrimeiroAcesso"]):
            include_once "../View/primeiroAcesso.php";
            break;
    }
?>