<?php
    class venda {
        public $itens = [];
        public $val_venda;

        public function add_item($nvitem){
            array_push($this->itens, $nvitem);
        }
        
        public function somarVenda(){
            $this->val_venda = array_reduce($this->itens, function($total, $valor) {
                return $total + $valor->valor;
            }, 0);
        }
    }
?>