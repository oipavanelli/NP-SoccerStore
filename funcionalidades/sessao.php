<?php
 
    session_start();


   /* if (isset($_SESSION['userLogado']) && $_SESSION['userLogado'] == 0 ) { # USUARIO COMUM LOGADO 

    }
    elseif (isset($_SESSION['userLogado']) && $_SESSION['userLogado'] == 1 ) { # USUARIO ADM LOGADO 

    } */


    if (isset($_GET['logout'])){
        session_destroy();

        header ('Location: http://localhost/4ibnovo/index.php ');
        exit;

        
    }
?>
