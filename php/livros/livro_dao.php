<?php

    class LivroDAO
    {
        public $codigo;
        public $nome;
        public $autor;
        public $data_pb;
        public $edicao;
        public $id_biblioteca;

        public function set($prop, $value) {
            $this->$prop = $value;
        }

        public function cadastrar() {
            $objeto = new Conexao();
            $sql = "INSERT INTO livro (codigo, nome, autor, data_pb, edicao, biblioteca)
                    VALUES ('$this->codigo', '$this->nome', '$this->autor', '$this->data_pb', '$this->edicao', '$this->id_biblioteca');";
            $objeto->set("sql", $sql);  
            $objeto->query();
            return "Cadastrado com Sucesso";
        }
        
        public function alterar()
        {
            $objeto = new Conexao();
            $sql = "UPDATE livro
                    SET 
                    nome='$this->nome', 
                    autor='$this->autor', 
                    data_pb='$this->data_pb', 
                    edicao='$this->edicao',
                    biblioteca='$this->id_biblioteca'
                    WHERE codigo='$this->codigo'";
            $objeto->set("sql", $sql);  
            $objeto->query();
            return "Alterado com Sucesso";
        }

        public function pesquisar()
        {
            $objeto = new Conexao();
            $sql = "SELECT livro.codigo, livro.nome, livro.autor, livro.data_pb, livro.edicao, livro.biblioteca, biblioteca.nome FROM livro INNER JOIN biblioteca ON (biblioteca.idBiblioteca = livro.biblioteca) WHERE 
                    livro.codigo LIKE '$this->codigo' OR 
                    livro.nome LIKE '$this->nome' OR
                    livro.autor LIKE '$this->autor' OR
                    livro.data_pb LIKE '$this->data_pb' OR
                    livro.edicao LIKE '$this->edicao' OR
                    livro.biblioteca LIKE '$this->id_biblioteca'";
            $objeto->set("sql", $sql);  
            $resultado = $objeto->query()->fetch_all(MYSQLI_NUM);
            $msg = "";
            foreach ($resultado as $livros)
            {
                $msg .= "<br>"; 
                foreach ($livros as $livro) {
                    $msg .= $livro . "<br>";
                }
            }
            return $msg;
        }

        public function excluir()
        {
            $objeto = new Conexao();
            $sql = "DELETE FROM livro
                    WHERE codigo='$this->codigo'";
            $objeto->set("sql", $sql);  
            $objeto->query();
            return "Excluído com Sucesso";
        }
    }
