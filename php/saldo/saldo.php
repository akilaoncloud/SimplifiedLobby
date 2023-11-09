
<?php

$salario = $_POST['salario'];

$alimentacao = $_POST['alimentacao'];
$passeios = $_POST['passeios'];
$pos_graduacao = $_POST['pos_graduacao'];
$aluguel = $_POST['aluguel'];
$conta_luz = $_POST['conta_luz'];

$gastos = ($alimentacao + $passeios + $pos_graduacao + $aluguel + $conta_luz );
$salario_liquido = $salario - $gastos;

if ( $gastos > $salario ) {

  echo ("Entre em contato com um agiota imediatemente, seu saldo devedor é de R$ ");
  echo number_format($salario_liquido, 2, ',','.');

}

else {

  echo ("Você não está devendo, seu saldo é de R$ $salario_liquido");

}

?>