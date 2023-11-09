<?php

var_dump($_GET);

if(count($_GET)) {
    echo "<br>" . count($_GET) . "<br>";
    echo "Nome: " . ($_GET["nome"] ?? "") . "<br>";
    echo "Email: " . ($_GET["email"] ?? "") . "<br>";
}

?>