<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Pacientes</title>

<link rel="stylesheet" href="style.css" />

</head>

<body>
<div id="content">

<h1>REPORTE DE USUARIOS</h1>

<hr />

<?php
	include_once("conexion.php");

	$con = new DB;
	$pacientes = $con->conectar();
	$strConsulta = "SELECT identificacion, nombre, apellido, ciudad, telefono, direccion, correo, contrasena from registrarse";
	$pacientes = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($pacientes);
	
	echo '<table cellpadding="0" cellspacing="0" width="100%">';
	echo '<thead><tr><td>identificacion</td><td>nombre</td><td>apellido</td><td>ciudad</td><td>telefono</td><td>direccion</td><td>correo</td><td>contrasena</td></tr></thead>';
	for ($i=0; $i<$numfilas; $i++)
	{
		$fila = mysql_fetch_array($pacientes);
		$numlista = $i + 1;
		echo '<td>'.$fila['identificacion'].'</td>';
		echo '<td>'.$fila['nombre'].'</td>';
		echo '<td>'.$fila['apellido'].'</td>';
		echo '<td>'.$fila['ciudad'].'</td>';
		echo '<td>'.$fila['telefono'].'</td>';
		echo '<td>'.$fila['direccion'].'</td>';
		echo '<td>'.$fila['correo'].'</td>';
		echo '<td>'.$fila['contrasena'].'</td>';
	

   
		echo '<td><a href="reporte_historial.php?id='.$fila['identificacion'].'">ver</a></td></tr>';
	}
	echo "</table>";
?>			

</div>
</body>
</html>