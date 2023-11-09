<DOCTYPE! html>
<html lang="pt-br">
<head>
</head>
<body>
<h2>Se o estudante for aprovado...</h2><br>

<?php

$Nome= "Gabriel Marcos";
$Nota1= "7";
$Nota2= "9";
$Nota3= "5";

$media = ( $Nota1 + $Nota2 + $Nota3 )/ 3;

if ( $media >= 6 ) {

echo ("Aprovado! Você está de parabéns ;)" );
echo "</br>";
echo "</br>";


}

else {

echo ("Reprovado! Se esforçe mais da próxima vez :(");
echo "</BR>";
echo "</BR>";



}

echo "Estudante:  $Nome";
echo "</BR>";
echo "Média:   $media";
echo "</BR>";
echo "</BR>";
echo ("Suas Notas Foram:  ");
echo "</BR>";
echo "Nota 1:  $Nota1";
echo "</BR>";
echo "Nota 2:  $Nota2";
echo "</BR>";
echo "Nota 3:  $Nota3";


?>

</body>
</html>

<DOCTYPE! html>
<html lang="pt-br">
<head>
</head>
<body>
<h2>Se o estudante for reprovado...</h2><br>
<?php

$Nome= "Gabriel Marcos";
$Nota1= "3";
$Nota2= "5";
$Nota3= "4";

$media = ( $Nota1 + $Nota2 + $Nota3 )/ 3;

if ( $media >= 6 ) {

echo ("Aprovado! Você está de parabéns ;)" );
echo "</BR>";
echo "</BR>";


}

else {

echo ("Reprovado! Se esforçe mais da próxima vez :(");
echo "</BR>";
echo "</BR>";



}

echo "Estudante:  $Nome";
echo "</BR>";
echo "Média:   $media";
echo "</BR>";
echo "</BR>";
echo ("Suas Notas Foram:  ");
echo "</BR>";
echo "Nota 1:  $Nota1";
echo "</BR>";
echo "Nota 2:  $Nota2";
echo "</BR>";
echo "Nota 3:  $Nota3";


?>

</body>
</html>