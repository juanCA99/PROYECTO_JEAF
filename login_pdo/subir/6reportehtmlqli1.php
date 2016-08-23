<?php
$host="localhost";
$usuario="root";
$password="";
$db="proyecto";


$conexion = new mysqli($host,$usuario,$password,$db);
$sql = "select * from electrodomesticos";
$query=$conexion->query($sql);

 
//$conexion = mysql_connect("localhost","root","");
//mysql_select_db("proyecto",$conexion);
 //$sql= mysql_query("select * from electrodomesticos");
//while($res=mysql_fetch_array($sql)){

			
	$tbHtml="";
	if($query->num_rows>0){
		
	        echo "<table border='1px'>
             <header>
                <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>TIPO</th>
				   <th>MARCA</th>
				    <th>PRECIO</th>
             
                  </tr>
            </header>";
		

		
		while($res=$query->fetch_array())
		{
// Configuración imagen, traer ubicación de la tabla y luego colocar dentro
// del html para decirle donde esta la imagen
$z=$res['ubicacion'];
$x="<img src='$z' width='150' height='150' alt='Alargada' border='0'>";



		
         echo '<tr>
		<td>'.$res['idelectrodomesticos'].'</td>
		<td>'.$res['nombre'].$x.'</td>
		<td>'.$res['tipo'].'</td>
		<td>'.$res['marca'].'</td>
		<td>'.$res['precio_unitario'].'</td>
		<br>
		
	</tr>';
		}
		$tbHtml.= "</table>";
	}
	else
	{
	echo "No hay resultados";
	}
	//cambiar los datos por productos
	
?>
<html>
<head>
<body>
<h1><font color ="green" size="16" face ="algerian"> BIENVENIDO</font></H1>

</html>
</head>
</body>