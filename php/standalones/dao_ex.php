<!--
    Código do Banco

    CREATE TABLE item(
	nome varchar(80) not null,
    raridade varchar(20) not null,
    id smallint unique not null,
    elemento varchar(20) not null,
	efeito varchar(20) not null,
    primary key (id)
);	

-->

<?php
    $host = "localhost";
    $dbname = 'exemplo';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$dbname";

    try {
        $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
    }
?>
<?php // Classe item 
    class item {
        private $conn; // O único atributo é a variável $conn

        public function __construct(PDO $conn){
            $this->conn = $conn; //  Variável recebe a conexão com o Banco
        }

        public function cadastrar($nome, $raridade, $id, $elemento, $efeito) {
            $stmnt = $this->conn->prepare('INSERT INTO item (nome, raridade, id, elemento, efeito) VALUES (?, ?, ?, ?, ?)');
            $stmnt->execute([$nome, $raridade, $id, $elemento, $efeito]);
        }

        public function atualizar($id, $nome, $raridade, $elemento, $efeito) {
            $stmnt = $this->conn->prepare('UPDATE item SET nome = ?, raridade = ?, elemento = ?, efeito = ? WHERE id = ?');
            $stmnt->execute([$nome, $raridade, $elemento, $efeito, $id]);
        }

        public function excluir($id) {
            $stmnt = $this->conn->prepare('DELETE FROM item WHERE id = ?');
            $stmnt->execute([$id]);
        }

        public function buscarPorid($id) {
            $stmnt = $this->conn->prepare('SELECT * FROM item WHERE id = ?');
            $stmnt->execute([$id]);
            return $stmnt->fetch(PDO::FETCH_ASSOC);
        }
        
        public function listarTodos() {
            $stmnt = $this->conn->prepare('SELECT * FROM item');
            $stmnt->execute();
            return $stmnt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
<?php
    $item = new item($conn);
?>
<!DOCTYPE html> <!-- Arquivo HTML -->
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAO</title>
    <style> /* CSS */
        body {
            display: flex;
            justify-content: space-around;
        }

        div {
            width: 170px;
        }
    </style>
</head>
<body>
    <div>    
        <h2>Cadastrar</h2>
        <form action="" method="post"> <!-- Formulário de Cadastro -->
            <label for="nome"><h3>Nome</h3></label>
            <input required type="text" name="nome">
            <label for="raridade"><h3>Raridade</h3></label>
            <input required type="text" name="raridade">
            <label for="id"><h3>ID</h3></label>
            <input required type="number" name="id">
            <label for="elemento"><h3>Elemento</h3></label>
            <input required type="text" name="elemento">
            <label for="efeito"><h3>Efeito</h3></label>
            <input required type="text" name="efeito">
            <br><br>
            <input type="submit" value="Cadastrar" name="cadastrar">
        </form>
        <?php
            if (isset($_POST["cadastrar"])){
                // Método Cadastro
                $item->cadastrar($_POST["nome"], $_POST["raridade"], $_POST["id"], $_POST["elemento"], $_POST["efeito"]);
            }
        ?>
    </div>

    <div>
        <h2>Atualizar</h2>
        <form action="" method="post"> <!-- Formulário de Atualização -->
            <label for="id"><h3>ID</h3></label>
            <input required type="number" name="id">
            <label for="nome"><h3>Nome</h3></label>
            <input type="text" name="nome">
            <label for="raridade"><h3>Raridade</h3></label>
            <input type="text" name="raridade">
            <label for="elemento"><h3>Elemento</h3></label>
            <input type="text" name="elemento">
            <label for="efeito"><h3>Efeito</h3></label>
            <input type="text" name="efeito">
            <br><br>
            <input type="submit" value="Atualizar" name="atualizar">
        </form>
        <?php
            if (isset($_POST["atualizar"])){
                // Método Atualização
                $item->atualizar($_POST["id"], $_POST["nome"], $_POST["raridade"], $_POST["elemento"], $_POST["efeito"]);
            }
        ?>
    </div>

    <div>
        <h2>Excluir</h2>
        <form action="" method="post"> <!-- Formulário de Exclusão -->
            <label for="id"><h3>ID</h3></label>
            <input required type="number" name="id">
            <br><br>
            <input type="submit" value="Excluir" name="excluir">
        </form>
        <?php
            if (isset($_POST["excluir"])){
                // Método Exclusão
                $item->excluir($_POST["id"]);
            }
        ?>
    </div>

    <div>
        <h2>Buscar</h2>
        <form action="" method="post"> <!-- Formulário de Busca -->
            <label for="id"><h3>ID</h3></label>
            <input required type="number" name="id">
            <br><br>
            <input type="submit" value="Buscar" name="buscar">
        </form>
        <?php
            if (isset($_POST["buscar"])){
                // Método Busca
                $result = $item->buscarPorid($_POST["id"]);
                
                echo "<br>";

                foreach($result as $key => $value){
                    echo strtoupper($key)." - $value <br>";
                }
            }
        ?>
    </div>

    <div>
        <h2>Listar Itens</h2>
        <?php
            // Método Busca
            $result = $item->listarTodos();

            foreach($result as $array){
                foreach($array as $key => $value){
                    echo strtoupper($key)." - $value <br>";
                } echo "<br>";
            }
        ?>
    </div>
</body>
</html>