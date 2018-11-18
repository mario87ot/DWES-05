<?php

require_once 'funciones.php';

$server=new SoapServer("http://localhost/tarea5/funciones.wsdl");
$server->setClass("Funciones");
$server->handle();