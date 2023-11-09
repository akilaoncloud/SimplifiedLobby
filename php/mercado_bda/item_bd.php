<?php
    class item {
        private $conn;
        public $prdt;
        public $venda;
        
        public function __construct(PDO $conn, produto $prdt){
            $this->conn = $conn;
            $this->prdt = $prdt;
        }

        public function listarTodos() {
            $stmnt1 = $this->conn->prepare('SELECT MAX(id) FROM venda');
            $stmnt1->execute();
            $id_venda = $stmnt1->fetch(PDO::FETCH_ASSOC)["MAX(id)"];
            $stmnt2 = $this->conn->prepare('SELECT * FROM item WHERE item.id_venda = ?');
            $stmnt2->execute([$id_venda]);
            return $stmnt2->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function buscarPorId($id) {
            $stmnt = $this->conn->prepare('SELECT * FROM item WHERE id = ?');
            $stmnt->execute([$id]);
            return $stmnt->fetch(PDO::FETCH_ASSOC);
        }
    
        public function inserir($id_produto, $qtd) {
            $stmnt1 = $this->conn->prepare('SELECT MAX(id) FROM venda');
            $stmnt1->execute();
            $id_venda = $stmnt1->fetch(PDO::FETCH_ASSOC)["MAX(id)"];
            $stmnt2 = $this->conn->prepare('INSERT INTO item (id_produto, id_venda, qtd, valor) VALUES (?, ?, ?, ?)');
            $valor = $this->prdt->buscarPorId($id_produto)["valor_un"] * $qtd;
            $stmnt2->execute([$id_produto, $id_venda, $qtd, $valor]);
        }
    
        public function atualizar($id, $id_venda, $id_produto, $qtd) {
            $stmnt = $this->conn->prepare('UPDATE item SET id_venda = ?, id_produto = ?, qtd = ? WHERE id = ?');
            $stmnt->execute([$id_venda, $id_produto, $qtd, $id]);
        }
    
        public function excluir($id) {
            $stmnt = $this->conn->prepare('DELETE FROM item WHERE id = ?');
            $stmnt->execute([$id]);
        }
    }
?>