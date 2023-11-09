<?php session_start() ?>

<?php

    $nome = 'Thiago Alexandre';
    $email = 'thiago.alexandre@estudante.ifgoiano.edu.br';
    $matricula = '2020104100910665';

    if(isset($_SESSION['login'])) {

        include('home_ifgoiano/home_ifgoiano.php');

        if(isset($_GET['logout'])) {
            unset($_SESSION['login']);
            session_destroy();
            header('Location: index.html');
        }

    } else { 
        include('login/login.php');
    }

?>
