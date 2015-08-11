<?php

require_once('lib/nusoap.php');
$cliente = new nusoap_client('http://test/checho/servicio.php');
$resultado = $cliente->call(
    'calculadora',
    array('x' => '3',
    'y' => 4,
    'operacion' => 'multiplica')
);
echo $resultado;
