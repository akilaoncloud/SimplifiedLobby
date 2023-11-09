<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.O.O.</title>
</head>
<body>

    <form action="" method="post">
        <input type="radio" name="rad" id="bol1" value="1">
        <label for="bol1">Bola 1</label>
        <input type="radio" name="rad" id="bol2" value="2">
        <label for="bol2">Bola 2</label><br><br>
        <input type="text" name="cor">
        <input type="submit">
    </form>
    <br>
    
    <?php
    
    class Esfera {

        public $cor = "Branco-padrão";
        public $textura = "Liso-padrão";

        public function NovaCor($nvcor){
            $this->cor = $nvcor;
        }

        public function VerCor(){
            return $this->cor . "<br>";
        }

        public function VerTextura(){
            return $this->textura . "<br>";
        }
    }

    $bol1 = new Esfera;
    $bol2 = new Esfera;

    if(isset($_POST["cor"]) and isset($_POST["rad"])){    
        if($_POST["rad"] == 1){
            $bol1->NovaCor($_POST["cor"]);
        } else if ($_POST["rad"] == 2) {
            $bol2->NovaCor($_POST["cor"]);
        }
    }
    
    echo $bol1->VerCor(); 
    echo $bol1->VerTextura();
    echo "<br>";
    echo $bol2->VerCor();
    echo $bol2->VerTextura();
    
    ?>

</body>
</html>