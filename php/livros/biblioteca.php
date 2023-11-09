<?php 

    class Biblioteca 
    {
        public $id;
        public $nome;
        public $endereco;
        public $bairro;
        public $cidade;
        
        public function set($prop, $value) {
            $this->$prop = $value;
        }

        public function cadastrar()
        {
            $objeto = new BibliotecaDAO();
            $objeto->set("id", $this->id);
            $objeto->set("nome", $this->nome);
            $objeto->set("endereco", $this->endereco);
            $objeto->set("bairro", $this->bairro);
            $objeto->set("cidade", $this->cidade);
            return $objeto->cadastrar();
        }

        public function alterar()
        {
            $objeto = new BibliotecaDAO();
            $objeto->set("id", $this->id);
            $objeto->set("nome", $this->nome);
            $objeto->set("endereco", $this->endereco);
            $objeto->set("bairro", $this->bairro);
            $objeto->set("cidade", $this->cidade);
            return $objeto->alterar();
        }

        public function excluir()
        {
            $objeto = new BibliotecaDAO();
            $objeto->set("id", $this->id);
            return $objeto->excluir();
        }
    }

?>