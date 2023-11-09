<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado P.O.O. Session</title>
    <style>
        body {
            display: flex;
            flex-direction: row;
        }

        section {
            margin: 10px 30px 10px 10px;
        }

        th {
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
        include "produto_ss.php";
        include "item_ss.php";
        include "venda_ss.php";
        include "caixa_ss.php";
        
        use session\produto as produto;
        
        session_start();

        if (isset($_SESSION["produtos"])) {
            $prdts = unserialize($_SESSION["produtos"]);
        } else {
            $prdts = [];
        }

        if (isset($_SESSION["itens"])) {
            $itens = unserialize($_SESSION["itens"]);
        } else {
            $itens = [];
        }

        if(isset($_POST["cad"])){    
            $prdt = new produto;
            $prdt->novoProduto($prdts);

            array_push($prdts, $prdt);

            $_SESSION["produtos"] = serialize($prdts);
        }

        if (isset($_POST["vnd"])){
            $item = new item;                
            $item->add_produto($prdts[$_POST["prd"]], $_POST["qt"]);
            array_push($itens, $item);
            $_SESSION["itens"] = serialize($itens);
        }

        if(isset($_POST["del"])){                
            array_splice($itens,$_POST["item"],1);
            $_SESSION["itens"] = serialize($itens);
        }
    ?>
    <section>
        <h1>Cadastro</h1>
        <form action="" method="post">

            <label for="nm">Nome</label><br>
            <input type="text" name="nm" required><br><br>

            <label for="vu">Valor Unitário</label><br>
            <input type="text" name="vu" required><br><br>

            <input type="submit" name="cad" value="Cadastrar">
        </form>
    </section>
    <section>
        <h1>Venda</h1>
        <form action="" method="post">
            <label for="prd">Produto</label><br>
            <select name="prd" id="prd" required>
                <option value="" selected disabled>Selecione</option>
                <?php
                    foreach ($prdts as $produto){
                        echo "<option value='{$produto->id}''>{$produto->nome}</option>";
                    }
                ?>
            </select><br><br>

            <label for="vu">Quantidade</label><br>
            <input type="number" name="qt" required><br><br>

            <input type="submit" name="vnd" value="Adicionar">
        </form>
        <form action="" method="post">
        <label for="item"><h3>Excluir</h3></label>
            <select name="item" id="item" required>
                <option value="" selected disabled>Selecione</option>
                <?php
                    $i = 0;
                    foreach ($itens as $item){
                        echo "<option value='{$i}'>". $i + 1 ." - {$item->produto->nome}</option>";
                        $i++;
                    }
                ?>
            </select><br><br>
            <input type="submit" name="del" value="Excluir Item">
        </form>
    </section>
    <section>
        <?php
            if(sizeof($itens) > 0){                
                $venda = new venda;

                foreach ($itens as $item){
                    $venda->add_item($item);
                }
    
                $venda->somarVenda();

                $caixa = new caixa;

                $caixa->checkSaldo();
                
                $caixa->addVenda($venda);
                
                $caixa->somarCaixa();
                $caixa->imprimirNota();

                $caixa->checkSaldo();
            }
        ?>
    </section>
</body>
</html>