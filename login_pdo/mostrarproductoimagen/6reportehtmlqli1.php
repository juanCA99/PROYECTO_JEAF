<?php

 
$conexion = mysql_connect("localhost","root","");
mysql_select_db("proyecto",$conexion);
 $sql= mysql_query("select * from electrodomesticos");
while($res=mysql_fetch_array($sql)){
	
echo'<tr>
		<td>'.$res['idelectrodomesticos'].'</td>
		<td>'.$res['nombre'].'</td>
		<td>'.$res['tipo'].'</td>
		<td>'.$res['marca'].'</td>
		<td>'.$res['precio_unitario'].'</td>
	</tr>
	';
	}
	
	
			
	$tbHtml="";
	if($query->num_rows>0){
		
	        echo "<table border='1px'>
             <header>
                <tr>
                  <th>Idelectrodomesticos</th>
                  <th>Nombre</th>
                  <th>Tipo</th>
				   <th>Marca</th>
				    <th>Precio_Unitario</th>
              
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
	</tr>
	';
		}
		$tbHtml.= "</table>";
	}
	else
	{
	echo "No hay resultados";
	}
	//cambiar los datos por productos
	
?>
 
