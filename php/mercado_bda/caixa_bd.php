<?php
    class caixa {
        private $conn;
        public $venda;

        public function __construct(PDO $conn, venda $venda){
            $this->conn = $conn;
            $this->venda = $venda;
        }

        public function checkSaldo($id){
            $stmnt = $this->conn->prepare('SELECT saldo FROM caixa WHERE id = ?');
            $stmnt->execute([$id]);      
            $saldo = $stmnt->fetch(PDO::FETCH_ASSOC)["saldo"];     
            return $saldo;
        }

        public function atualizarSaldo($id){
            $stmnt = $this->conn->prepare('UPDATE caixa SET saldo = ? WHERE id = ?');
            $vendas = $this->venda->listarTodos();
            $saldo = array_reduce($vendas, function($total, $valor) {
                return $total + $valor["valor"];
            }, 0);
            $stmnt->execute([$saldo, $id]);
        }

        public function visualizarNota(){            
            
            $stmnt1 = $this->conn->prepare('SELECT * FROM venda WHERE id = ( SELECT MAX(id) FROM venda )');
            $stmnt1->execute();
            $venda = $stmnt1->fetch(PDO::FETCH_ASSOC);

            $i = 0;

            $stmnt2 = $this->conn->prepare('SELECT produto.nome, item.qtd, produto.valor_un, item.valor FROM produto INNER JOIN item ON (produto.id = item.id_produto) WHERE item.id_venda = ?');
            $stmnt2->execute([$venda["id"]]);
            $nfe = $stmnt2->fetchAll(PDO::FETCH_ASSOC);
            
            echo "============ NOTA FISCAL ============ <br>";
            echo "<table>";

            echo "<tr> <th>Num.</th> <th>Produto</th> <th>Qtd.</th> <th>Valor Unit.</th> <th>Valor do Item</th> </tr>";
            
            foreach ($nfe as $item) {
                $i++;

                echo "<tr> <td>{$i}</td> <td>{$item["nome"]}</td> <td>{$item["qtd"]}x</td> <td>R$ {$item["valor_un"]}</td> <td>R$ {$item["valor"]}</td> </tr>";
                
                echo "<tr> <td colspan='5'>------------------------------------------------------------</td> </tr>";
            }
            echo "<tr> <td></td> <td></td> <td></td> <td><strong>TOTAL</strong></td> <td>R$ {$venda["valor"]}</td> </tr>";
            
            echo "</table>";
            echo "==================================== <br><br>";      
        }

        public function imprimirNotas(){            
            foreach ($this->venda->listarTodos() as $venda) {
                $i = 0;

                $stmnt = $this->conn->prepare('SELECT produto.nome, item.qtd, produto.valor_un, item.valor FROM produto INNER JOIN item ON (produto.id = item.id_produto) WHERE item.id_venda = ?');
                $stmnt->execute([$venda["id"]]);
                $nfe = $stmnt->fetchAll(PDO::FETCH_ASSOC);
                
                echo "============ NOTA FISCAL ============ <br>";
                echo "<table>";

                echo "<tr> <th>Num.</th> <th>Produto</th> <th>Qtd.</th> <th>Valor Unit.</th> <th>Valor do Item</th> </tr>";
                
                foreach ($nfe as $item) {
                    $i++;

                    echo "<tr> <td>{$i}</td> <td>{$item["nome"]}</td> <td>{$item["qtd"]}x</td> <td>R$ {$item["valor_un"]}</td> <td>R$ {$item["valor"]}</td> </tr>";
                    
                    echo "<tr> <td colspan='5'>------------------------------------------------------------</td> </tr>";
                }
                echo "<tr> <td></td> <td></td> <td></td> <td><strong>TOTAL</strong></td> <td>R$ {$venda["valor"]}</td> </tr>";
                
                echo "</table>";
                echo "==================================== <br><br><br>";
            }            
        }
    }
?>