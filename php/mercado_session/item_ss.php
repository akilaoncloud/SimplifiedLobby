<?php
    class item {
        public $produto;
        public $qtd;
        public $valor;

        public function add_produto($nvproduto, $nvqtd){
            $this->produto = $nvproduto;
            $this->qtd = $nvqtd;
            $this->valor = $nvproduto->valor_un * $this->qtd;
        }
    }
?>