<!DOCTYPE html>
<html>
<body>

<?php
for ($i = 1; $i <= 11; $i++){
	
    if ($i % 2 == 0){
    
        for ($x = 5; $x <= 25; $x++){
        echo "$x ";
        }
    } else {
        
        for ($x = 25; $x >= 5; $x--){
        echo "$x ";
        }
    } 
    echo "<br>";
    
}
?>

<?php
echo "<br>";

$notas = [
	"n1" => 6,
    "n2" => 6,
    "n3" => 6,
    "n4" => 7,
];

$m = array_sum($notas) / count($notas);

if ($m >= 6){
	echo $m . " | Aprovado!";
} else {
	echo $m . " | Reprovado!";
};

?>

<?php
echo "<br><br>";

$gastos = [
    "comb" => 100,
    "alug" => 100,
    "agua" => 100,
    "luz" => 100,
    "tel" => 100,
    "farm" => 100,
];

$renda = [
    "emp1" => 500,
    "emp2" => 500,
];

$saldo = array_sum($renda) - array_sum($gastos);

echo "Seu Saldo é: R$ " . $saldo;

?>

</body>
</html>
