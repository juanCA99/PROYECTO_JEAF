<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_Personal_usuarios.doc");


		$conexion=mysql_connect("localhost","root","");
		mysql_select_db("proyecto",$conexion);		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE USUARIOS</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA USUARIOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>identificacion</strong></td>
    <td><strong>nombre</strong></td>
    <td><strong>apellido</strong></td>
	<td><strong>ciudad</strong></td>
	<td><strong>telefono</strong></td>
	<td><strong>direccion</strong></td>
	<td><strong>correo</strong></td>
	<td><strong>contrasena</strong></td>
  </tr>
  
<?PHP
		
$sql=mysql_query("select identificacion, nombre, apellido, ciudad, telefono, direccion, correo, contrasena from registrarse");
while($res=mysql_fetch_array($sql)){		

	$identificacion=$res["identificacion"];
	$nombre=$res["nombre"];
	$apellido=$res["apellido"];
	$ciudad=$res["ciudad"];
	$telefono=$res["telefono"];
	$direccion=$res["direccion"];
	$correo=$res["correo"];
	$contrasena=$res["contrasena"];
					

?>  
 <tr>
	<td><?php echo $identificacion; ?></td>
	<td><?php echo $nombre; ?></td>
	<td><?php echo $apellido; ?></td>
	<td><?php echo $ciudad; ?></td>
	<td><?php echo $telefono; ?></td>
	<td><?php echo $direccion; ?></td>
	<td><?php echo $correo; ?></td>
	<td><?php echo $contrasena; ?></td>
	
                    
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>