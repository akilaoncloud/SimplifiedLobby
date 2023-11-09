<?php

    class Conexao {
    
        private $host = 'localhost:3306'; // Host (Servidor) que executa o banco de dados
        private $user = 'root'; // Usuário que se conecta ao servidor de banco de dados
        private $pass = ''; // Senha do usuário para conexão ao banco de dados
        private $db = 'livros'; // Nome do banco de dados a ser utilizado  //AINDA N�O TEM
        private $sql; // String da consulta SQL a ser executada
        
        function Conexao(){       
        }
    
        function set($prop, $value) {
            $this->$prop = $value;
        }

        function query() {
            $con = new mysqli($this->host, $this->user, $this->pass, $this->db);
            if ($con->connect_errno) {
                echo "Falha ao conectar: (" . $con->connect_errno . ") " . $con->connect_error;
            }
            
            $qry = mysqli_query($con, $this->sql) or 
                    die($this->erro(mysqli_error($con)));
            
            mysqli_close($con);
            
            return $qry;
        }

        function erro($erro) {
            echo $erro;
        }
    }
?>