<?php

require_once 'funciones.php';
require_once 'WSDLDocument.php';

$wsdl=new WSDLDocument('Funciones', 'http://localhost/tarea5/servicio.php', 'http://localhost/tarea5');
echo $wsdl->saveXml();