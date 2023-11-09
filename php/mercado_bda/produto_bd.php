<?php
    class produto {
        private $conn;

        public function __construct(PDO $conn){
            $this->conn = $conn;
        }

        public function listarTodos() {
            $stmnt = $this->conn->prepare('SELECT * FROM produto');
            $stmnt->execute();
            return $stmnt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function buscarPorId($id) {
            $stmnt = $this->conn->prepare('SELECT * FROM produto WHERE id = ?');
            $stmnt->execute([$id]);
            return $stmnt->fetch(PDO::FETCH_ASSOC);
        }
    
        public function inserir($nome, $valor_un) {
            $stmnt = $this->conn->prepare('INSERT INTO produto (nome, valor_un) VALUES (?, ?)');
            $stmnt->execute([$nome, $valor_un]);
        }
    
        public function atualizar($id, $nome, $valor_un) {
            $stmnt = $this->conn->prepare('UPDATE produto SET nome = ?, valor_un = ? WHERE id = ?');
            $stmnt->execute([$nome, $valor_un, $id]);
        }
    
        public function excluir($id) {
            $stmnt = $this->conn->prepare('DELETE FROM produto WHERE id = ?');
            $stmnt->execute([$id]);
        }
    }
?>