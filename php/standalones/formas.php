<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shapes</title>
</head>
<body style="margin: 18px 18px;">
    <?php
        class Shape {
            public $base;
            public $height;
            public $id;
            public $name = [
                1 => "Quadrado", 
                2 => "Retângulo",
                3 => "Triangulo Retângulo",
                4 => "Triângulo",
            ];

            public function printShape($id, $base, $height) {
                
                $this->base = $base;
                $this->height = $height;
                $this->id = $id;
                
                switch($id) {
                    case "1":
                        $this->printSquare();
                        break;
                    case "2":
                        $this->printRect();
                        break;
                    case "3":
                        $this->printTriRect();
                        break;
                    case "4":
                        $this->printTriangle();
                        break;
                }

                echo "<br>";
            } 

            private function printSquare() {
                for ($k = 1 ; $k <= $this->base ; $k++) {
                    for ($i = 1 ; $i <= $this->base ; $i++) {
                    echo "#⠀";
                    }
                    echo "<br>";
                }
            }
            private function printRect() {
                for ($k = 1 ; $k <= $this->height ; $k++) {
                    for ($i = 1 ; $i <= $this->base ; $i++) {
                    echo "#⠀";
                    }
                    echo "<br>";
                }

            }

            private function printTriRect() {
                $a = "";
                for ( $i = 1 ; $i <= $this->base ; $i++ ){
                    $a .= "#⠀";
                    echo $a . "<br>";
                }
            }

            private function printTriangle() {
                $full_base = $this->base;
                $blank_base = $full_base;
                $down = $full_base - 1;
                $down_reverse = 0;

                for ($k = 1 ; $k <= $full_base ; $k++) {

                    for ($i = $blank_base - $down ; $i < $blank_base ; $i++){
                        echo "⠀";   
                    } $down--;
                    
                    for ($i = $full_base - $down_reverse ; $i <= $full_base ; $i++){
                    echo "#⠀";
                    } $down_reverse++;

                    echo "<br>";
                }

            }

            public function checkShape() {
                echo "A forma acima é um {$this->name[$this->id]}.";
                echo "<br><br>-------------------------------------------------------<br><br>";
            }
        }

        $sqr = new shape;
        $sqr->printShape(1,5,2);
        $sqr->checkShape();
        
        $rect = new shape;
        $rect->printShape(2,5,2);
        $rect->checkShape();

        $rect_tri = new shape;
        $rect_tri->printShape(3,5,2);
        $rect_tri->checkShape();
        
        $tri = new shape;
        $tri->printShape(4,5,2);
        $tri->checkShape();

    ?>
</body>
</html>