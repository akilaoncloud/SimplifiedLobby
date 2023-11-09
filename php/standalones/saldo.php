<?php

$salario = "4550.00";

$alimentacao = "300.00";
$passeios = "800.00";
$pos_graduacao = "700.00";
$aluguel = "2000.00";
$conta_luz = "250.00";

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