<!DOCTYPE html>
<html>
    <head>
        <style>
            table, td, th {
                font-family: Arial;
                border: solid black 2px;
                border-collapse: collapse;
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Maioridade</th>
            </tr>
            <?php

            $nkey = array ( 
                1 => "Alexis", 
                2 => "Fernanda", 
                3 => "Luara", 
                4 => "Alberto", 
                5 => "Kaio", 
                6 => "Cinthya", 
                7 => "Ariadne", 
                8 => "Guilherme", 
                9 => "Nikolas" 
            );

            $num = rand (1, 20);

            $i = 1;

            do {
            $rand = rand (1, 9);

            $nome = $nkey[$rand];

            $idade = rand (8, 28);

            if ( $idade < 18 ) {
                $mrd = "Menor de Idade";
            }
            else {
                $mrd = "Maior de idade";
            }
            
            echo ("<tr><td>$nome</td><td>$idade anos</td><td>$mrd</td></tr>");
            $i++;
            } while ($i <= $num);

            ?>
        </table>
    </body>
</html>