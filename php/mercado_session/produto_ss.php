<?php
    namespace session;

    class produto {
        public $id; // ID ou código de barras do produto (é o mesmo do index na array).
        public $nome;
        public $valor_un;

        public function novoProduto($index){
            $this->id = sizeof($index); // Função conta quantos produtos já existem e atribui ao ID (0,1,2).
            $this->nome = $_POST["nm"]; // Nome recebido pelo formulário através do método POST.
            $this->valor_un = $_POST["vu"]; // A string dentro dos colchetes indicam de qual campo quero a informação.
        }
    }
?>