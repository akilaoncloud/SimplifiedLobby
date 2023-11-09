<?php
    $host = "localhost";
    $dbname = 'sist_vendas';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$dbname";

    try {
        $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
    }
?>