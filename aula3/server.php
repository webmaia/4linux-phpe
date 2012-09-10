<?php
function somar($a, $b) {
$teste = $a + $b;
return $teste;
}
$server = new SoapServer("calc.wsdl");
$server->addFunction("somar");
$server->handle();
