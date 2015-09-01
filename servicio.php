<?php

require_once('lib/nusoap.php');
require_once('calculadora.php');

$server = new soap_server();
$server->configureWSDL("psi", "urn:psi");
$server->soap_defencoding = 'UTF-8';

$server->wsdl->addComplexType(
    'input', 
    'complexType', 
    'struct', 
    'all', 
    '',
    array(
        'x'   => array('name' => 'x','type' => 'xsd:string'),
        'y'    => array('name' => 'y','type' => 'xsd:string'),
        'operacion'    => array('name' => 'operacion','type' => 'xsd:string')
    )
);
//$server->register('calculadora');
$server->register(
    'calculadora',
    //array('input' => 'tns:input'), 
    array('x' => 'xsd:string','y' => 'xsd:string','operacion' => 'xsd:string'),
    array("return" => "xsd:string"),
    'urn:psi',   //namespace
    'urn:psi#calculadora',  //soapaction
    'rpc', // style
    'encoded', // use
    'operaciones basicas'
);
@$server->service($HTTP_RAW_POST_DATA);

