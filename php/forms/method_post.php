<?php

var_dump($_POST);

if(count($_POST)) {
    echo "<br>" . count($_POST) . "<br>";
    echo "Nome: " . ($_POST["nome"] ?? "") . "<br>";
    echo "Email: " . ($_POST["email"] ?? "") . "<br>";
}

?>