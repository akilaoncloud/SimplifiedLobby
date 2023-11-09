<!DOCTYPE html>
<html>
<body>

<?php
$ca = rand (1, 2);

if ($ca == 1) {
$a = rand (1, 100);
$ca = "Positivo";
}
else {
$a = rand (-100, -1);
$ca = "Negativo";
}

$cb = rand (1, 2);

if ($cb == 1) {
$b = rand (1, 100);
$cb = "Positivo";
}
else {
$b = rand (-100, -1);
$cb = "Negativo";
}

$c = rand (-100, 100);

$x1 = (-$b + sqrt($b**2 - 4 * $a * $c)) / 2 * $a;
$x2 = (-$b - sqrt($b**2 - 4 * $a * $c)) / 2 * $a;

echo ("<p>$ca</p><h1>A = $a</h1><p>$cb</p><h1>B = $b</h1><h1>C = $c</h1><h1>X' = $x1</h1><h1>X'' = $x2</h1>");
?>

</body>
</html>
