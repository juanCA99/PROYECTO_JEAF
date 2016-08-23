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
                  <th>idelectrodomesticos</th>
                  <th>nombre</th>
                  <th>tipo</th>
					<th>marca</th>
					<th>precio_unitario</th>
					
                  </tr>
            </header>";
		
		while($res=$query->fetch_array())
		{
         echo '<tr>
		<td>'.$res['idelectrodomesticos'].'</td>
		<td>'.$res['nombre'].'</td>
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
 
