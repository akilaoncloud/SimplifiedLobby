<?php
    class venda {
        private $conn;
        public $item;

        public function __construct(PDO $conn, item $item){
            $this->conn = $conn;
            $this->item = $item;
        }

        public function listarTodos() {
            $stmnt = $this->conn->prepare('SELECT * FROM venda WHERE id != ( SELECT MAX(id) from venda ) ORDER BY id DESC');
            $stmnt->execute();
            return $stmnt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function buscarPorId($id) {
            $stmnt = $this->conn->prepare('SELECT * FROM venda WHERE id = ?');
            $stmnt->execute([$id]);
            return $stmnt->fetch(PDO::FETCH_ASSOC);
        }

        public function novaVenda() {
            $stmnt = $this->conn->prepare('INSERT INTO venda (valor) VALUES (?)');
            $stmnt->execute([0]);
        }
    
        public function atualizarValor() {
            $stmnt1 = $this->conn->prepare('SELECT MAX(id) FROM venda');
            $stmnt1->execute();
            $id = $stmnt1->fetch(PDO::FETCH_ASSOC)["MAX(id)"];
            $stmnt2 = $this->conn->prepare('UPDATE venda SET valor = ? WHERE id = ?');
            $itens = $this->item->listarTodos();
            $valor = array_reduce($itens, function($total, $valor) {
                return $total + $valor["valor"];
            }, 0);
            $stmnt2->execute([$valor, $id]);
        }
    
        public function excluir($id) {
            $stmnt = $this->conn->prepare('DELETE FROM  WHERE id = ?');
            $stmnt->execute([$id]);
        }
    }
?>