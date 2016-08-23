<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new electrodomestico();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idelectrodomesticos',              $_REQUEST['idelectrodomesticos']);
            $alm->__SET('nombre',          $_REQUEST['nombre']);
            $alm->__SET('tipo',        $_REQUEST['tipo']);
            $alm->__SET('marca',            $_REQUEST['marca']);
            $alm->__SET('precio_unitario', $_REQUEST['precio_unitario']);
			$alm->__SET('ubicacion', $_REQUEST['ubicacion']);

            $model->Actualizar($alm);
            header('Location: index.php');
            break;

        case 'registrar':
             $alm->__SET('idelectrodomesticos',              $_REQUEST['idelectrodomesticos']);
            $alm->__SET('nombre',          $_REQUEST['nombre']);
            $alm->__SET('tipo',        $_REQUEST['tipo']);
            $alm->__SET('marca',            $_REQUEST['marca']);
            $alm->__SET('precio_unitario', $_REQUEST['precio_unitario']);
			$alm->__SET('ubicacion', $_REQUEST['ubicacion']);

            $model->registrar($alm);
            header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idelectrodomesticos']);
            header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idelectrodomesticos']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MOSTRAR DATOS</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
}
body {
	background-image: url(maxresdefault%20(1).jpg);
	background-image: url(fondo4.jpg);
}
.Estilo2 {color: #FFFFFF}
.Estilo3 {color: #000000}
-->
        </style>
    <meta charset="utf-8">
    </head>
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >idelectrodomesticos</th>
                            <th >nombre</th>
                            <th >tipo</th>
                            <th >marca</th>
							<th >precio_unitario</th>
							<th >ubicacion</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('idelectrodomesticos'); ?></td>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('tipo'); ?></td>
							<td><?php echo $r->__GET('marca'); ?></td>
                            <td><?php echo $r->__GET('precio_unitario'); ?></td>
							 <td><?php echo $r->__GET('ubicacion'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <p>&nbsp;</p>     
              
            </div>
        </div>
        
          
        </div>
    </body>
</html>



