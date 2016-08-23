<?php 


$controller='login';

if (!isset($_REQUEST['controller'])) {
	$controller = ucwords($controller).'controlador';
	require_once 'controller/'.$controller.'.php';
	$controller = new $controller;
	$controller->Index();
}
else {

	$controller= ucwords($_REQUEST['controller']).'controlador';
	$accion= isset($)
}

?>