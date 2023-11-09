<?php

    class Livro {
        public $codigo;
        public $nome;
        public $autor;
        public $data_pb;
        public $edicao;
        public $id_biblioteca;
        
        public function set($prop, $value) {
            $this->$prop = $value;
        }

        public function cadastrar()
        {
            $objeto = new LivroDAO();
            $objeto->set("codigo", $this->codigo);
            $objeto->set("nome", $this->nome);
            $objeto->set("autor", $this->autor);
            $objeto->set("data_pb", $this->data_pb);
            $objeto->set("edicao", $this->edicao);
            $objeto->set("id_biblioteca", $this->id_biblioteca);
            return $objeto->cadastrar();
        }

        public function alterar()
        {
            $objeto = new LivroDAO();
            $objeto->set("codigo", $this->codigo);
            $objeto->set("nome", $this->nome);
            $objeto->set("autor", $this->autor);
            $objeto->set("data_pb", $this->data_pb);
            $objeto->set("edicao", $this->edicao);
            $objeto->set("id_biblioteca", $this->id_biblioteca);
            return $objeto->alterar();
        }

        public function pesquisar()
        {   
            $objeto = new LivroDAO();
            $objeto->set("codigo", $this->codigo);
            $objeto->set("nome", $this->nome);
            $objeto->set("autor", $this->autor);
            $objeto->set("data_pb", $this->data_pb);
            $objeto->set("edicao", $this->edicao);
            $objeto->set("id_biblioteca", $this->id_biblioteca);
            return $objeto->pesquisar();
        }

        public function excluir()
        {
            $objeto = new LivroDAO();
            $objeto->set("codigo", $this->codigo);
            return $objeto->excluir();
        }
    }

?>