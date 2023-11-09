<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado P.O.O. BDA</title>
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
        include "produto_bd.php";
        include "item_bd.php";
        include "venda_bd.php";
        include "caixa_bd.php";
        include "config.php";

        $prdt = new produto($conn);
        $item = new item($conn, $prdt);
        $venda = new venda($conn, $item);
        $caixa = new caixa($conn, $venda);
    ?>
    <section>
        <h1>Cadastro | Produto</h1>
        <form action="" method="post">
            <label for="nm">Nome</label><br>
            <input type="text" name="nm" required><br><br>

            <label for="vu">Valor Unitário</label><br>
            <input type="text" name="vu" required><br><br>

            <input type="submit" name="cad" value="Cadastrar">
        </form>
        <?php
            if(isset($_POST["cad"])){  
                $prdt->inserir($_POST["nm"],$_POST["vu"]);
            }
        ?>
        <form action="" method="post">
            <label for="delprdt"><h3>Excluir</h3></label>
            <?php
                if(isset($_POST["del_prdt_bt"])){             
                    $prdt->excluir($_POST["delprdt"]);
                }
            ?>
            <select name="delprdt" id="delprdt" required>
                <option value="" selected disabled>Selecione</option>
                <?php
                    foreach ($prdt->listarTodos() as $data){
                        echo "<option value='{$data['id']}''>{$data['id']} - {$data['nome']}</option>";
                    }
                ?>
            </select><br><br>
            <input type="submit" name="del_prdt_bt" value="Excluir Item">
        </form>
    </section>
    <section>
        <h1>Adição | Item</h1>
        <form action="" method="post">
            <label for="prdt">Produto</label><br>
            <?php
                if (isset($_POST["vnd"])){               
                    $item->inserir($_POST["prdt"], $_POST["qtd"]);
                    $venda->atualizarValor();
                    $caixa->atualizarSaldo(1);
                }
            ?>
            <select name="prdt" id="prdt" required>
                <option value="" selected disabled>Selecione</option>
                <?php
                    foreach ($prdt->listarTodos() as $data){
                        echo "<option value='{$data['id']}''>{$data['nome']}</option>";
                    }
                ?>
            </select><br><br>

            <label for="vu">Quantidade</label><br>
            <input type="number" name="qtd" required><br><br>

            <input type="submit" name="vnd" value="Adicionar">
        </form>
        <form action="" method="post">
            <label for="delitem"><h3>Excluir</h3></label>
            <select name="delitem" id="delitem" required>
                <option value="" selected disabled>Selecione</option>
                <?php
                    if(isset($_POST["del_item_bt"])){             
                        $item->excluir($_POST["delitem"]);
                        $venda->atualizarValor();
                        $caixa->atualizarSaldo(1);
                    }
                    $i = 0;
                    foreach ($item->listarTodos() as $data){
                        $i++;
                        echo "<option value='{$data['id']}'>Item {$i}</option>";
                    }
                ?>
            </select><br><br>
            <input type="submit" name="del_item_bt" value="Excluir Item">
        </form>
    </section>
    <section>
        <h1>Visualizar | Nota Fiscal</h1>
        <?php
            if(isset($_POST["nfe"])){             
                $venda->novaVenda();
            }
        ?>
        <?php                      
            $caixa->visualizarNota();
        ?>
        <form action="" method="post">
            <input type="submit" name="nfe" value="Nova Nota Fiscal">
        </form>
    </section>
    <section>
        <h1>Histórico | Notas Fiscais</h1>
        <?php                       
            echo "<strong>Saldo do caixa:</strong> R$ {$caixa->checkSaldo(1)} <br><br>";
            
            $caixa->imprimirNotas();
        ?>
    </section>
</body>
</html>