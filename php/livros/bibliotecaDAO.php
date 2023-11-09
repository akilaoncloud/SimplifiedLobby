<?php

    class BibliotecaDAO
    {
        public $id;
        public $nome;
        public $endereco;
        public $bairro;
        public $cidade;

        public function set($prop, $value) {
            $this->$prop = $value;
        }

        public function cadastrar() {
            $objeto = new Conexao();
            $sql = "INSERT INTO biblioteca (idBiblioteca, nome, endereco, bairro, cidade)
                    VALUES ('$this->id', '$this->nome', '$this->endereco', '$this->bairro', '$this->cidade');";
            $objeto->set("sql", $sql);  
            $objeto->query();
            return "Cadastrado com Sucesso";
        }
        
        public function alterar()
        {
            $objeto = new Conexao();
            $sql = "UPDATE biblioteca
                    SET 
                    nome='$this->nome', 
                    endereco='$this->endereco', 
                    bairro='$this->bairro', 
                    cidade='$this->cidade'
                    WHERE idBiblioteca='$this->id'";
            $objeto->set("sql", $sql);  
            $objeto->query();
            return "Alterado com Sucesso";
        }

        public function excluir()
        {
            $objeto = new Conexao();
            $sql = "DELETE FROM biblioteca
                    WHERE idBiblioteca='$this->id'";
            $objeto->set("sql", $sql);  
            $objeto->query();
            return "Excluído com Sucesso";
        }
    }
