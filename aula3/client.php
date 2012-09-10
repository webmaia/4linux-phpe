<?php
$calc = new SoapClient("calc.wsdl");
echo $calc->somar(2, 7);
