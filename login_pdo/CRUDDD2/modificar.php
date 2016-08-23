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
            header('Location: modificar.php');
            break;

        case 'registrar':
             $alm->__SET('idelectrodomesticos',              $_REQUEST['idelectrodomesticos']);
            $alm->__SET('nombre',          $_REQUEST['nombre']);
            $alm->__SET('tipo',        $_REQUEST['tipo']);
            $alm->__SET('marca',            $_REQUEST['marca']);
            $alm->__SET('precio_unitario', $_REQUEST['precio_unitario']);
			$alm->__SET('ubicacion', $_REQUEST['ubicacion']);

            $model->registrar($alm);
            header('Location: modificar.php');
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
        <title>MODIFICAR DATOS</title>
         <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body,td,th {
	color: BROWN;
}
body {
	background-image: url(fondo5.jpg);
}
.Estilo7 {color: #FFFFFF; font-weight: bold; font-size: 18px; }
.Estilo21 {color: #FFFFFF; font-size: 36; }
.Estilo23 {color: #FFFFFF}
-->
        </style>
    <meta charset="utf-8">
    </head>
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
                
              <form action="?action=<?php echo $alm->idelectrodomesticos > 0 ? 'actualizar' : 'Registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="idelectrodomesticos" value="<?php echo $alm->__GET('idelectrodomesticos'); ?>" />
                    
                    <table >
                        <tr>
                            <th >Nombre</th>
                            <td><input type="text" name="nombre" value="<?php echo $alm->__GET('nombre'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >tipo</th>
                            <td><input type="text" name="tipo" value="<?php echo $alm->__GET('tipo'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >marca</th>
                            <td><input type="text" name="marca" value="<?php echo $alm->__GET('marca'); ?>"  /></td>
                      
                        </tr>
                        <tr>
                            <th >precio_unitario</th>
                            <td><input type="text" name="precio_unitario" value="<?php echo $alm->__GET('precio_unitario'); ?>"  /></td>
                        </tr>
						<tr>
                            <th >ubicacion</th>
                            <td><input type="text" name="ubicacion" value="<?php echo $alm->__GET('ubicacion'); ?>"  /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
              </form>

              <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th bgcolor="#ffffff" >idelectrodomesticos</th>
                            <th bgcolor="#ffffff" >nombre</th>
                            <th bgcolor="#ffffff" >tipo</th>
                            <th bgcolor="#ffffff" >marca</th>
                            <th bgcolor="#ffffff" >precio_unitario </th>
                            <th bgcolor="#ffffff" >ubicacion</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td bgcolor="#ffffff"><?php echo $r->__GET('idelectrodomesticos'); ?></td>
                            <td bgcolor="#ffffff"><?php echo $r->__GET('nombre'); ?></td>
                            <td bgcolor="#ffffff"><?php echo $r->__GET('tipo') ; ?></td>
                            <td bgcolor="#ffffff"><?php echo $r->__GET('marca'); ?></td>
							<td bgcolor="#ffffff"><?php echo $r->__GET('precio_unitario'); ?></td>
							<td bgcolor="#ffffff"><?php echo $r->__GET('ubicacion'); ?></td>
                            <td bgcolor="#ffffff">
                                <a href="?action=editar&idelectrodomesticos=<?php echo $r->idelectrodomesticos; ?>">Editar</a>
                            </td>
                            <td bgcolor="#ffffff">
                                <a href="?action=eliminar&idelectrodomesticos=<?php echo $r->idelectrodomesticos; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

              
            </div>
        </div>

    </body>
</html>



