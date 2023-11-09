<!DOCTYPE html>
<html>
<head>
<style>
body {
	background-color: rgb(21,32,43); color: white;
}

p {
	margin: 0px 0px 5px 0px;
}

table, td, th {
	border: solid white 2px;
    border-collapse: collapse;
    padding: 10px;
}
</style>
</head>

<body>

<table>

<tr>
	<th>Frase Repetida</th>
    <th>Quantidade</th>
</tr>

<?php
$num = rand (1, 40);
$txt = "PHP";
echo str_repeat ("<tr><td>I love $txt!</td><td>Ela está sendo repetida $num vezes!</td></tr>", $num);
?>

</table>

</body>
</html>