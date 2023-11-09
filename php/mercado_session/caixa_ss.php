<?php
    class caixa {
        public $vendas = [];
        public $saldo = 100;

        public function checkSaldo(){            
            echo "<strong>Saldo do caixa:</strong> R$ {$this->saldo} <br><br>";
        }

        public function addVenda($nv_venda){
            array_push($this->vendas, $nv_venda);
        }

        public function somarCaixa(){
            $this->saldo += array_reduce($this->vendas, function($total, $venda) {
                return $total + $venda->val_venda;
            }, 0);
        }

        public function imprimirNota(){
            foreach ($this->vendas as $venda) {
                $i = 0;

                echo "============ NOTA FISCAL ============ <br>";
                echo "<table>";

                echo "<tr> <th>Num.</th> <th>Produto</th> <th>Qtd.</th> <th>Valor Unit.</th> <th>Valor do Item</th> </tr>";
                
                foreach ($venda->itens as $item) {
                    $i++;

                    echo "<tr> <td>{$i}</td> <td>{$item->produto->nome}</td> <td>{$item->qtd}x</td> <td>R$ {$item->produto->valor_un}</td> <td>R$ {$item->valor}</td> </tr>";
                    
                    echo "<tr> <td colspan='5'>------------------------------------------------------------</td> </tr>";
                    
                }
                echo "<tr> <td></td> <td></td> <td></td> <td><strong>TOTAL</strong></td> <td>R$ {$venda->val_venda}</td> </tr>";
                
                echo "</table>";
                echo "==================================== <br><br>";
            }            
        }
    }
?>