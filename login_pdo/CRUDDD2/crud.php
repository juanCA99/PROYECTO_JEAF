
<?php



require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new electrodomestico();
$model = new AlumnoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
             $alm->__SET('idelectrodomesticos',              $_REQUEST['idelectrodomesticos']);
            $alm->__SET('nombre',          $_REQUEST['nombre']);
            $alm->__SET('tipo',        $_REQUEST['tipo']);
            $alm->__SET('marca',            $_REQUEST['marca']);
            $alm->__SET('precio_unitario', $_REQUEST['precio_unitario']);
			$alm->__SET('ubicacion', $_REQUEST['ubicacion']);

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.php');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('idelectrodomesticos',              $_REQUEST['idelectrodomesticos']);
            $alm->__SET('nombre',                           $_REQUEST['nombre']);
            $alm->__SET('tipo',                             $_REQUEST['tipo']);
            $alm->__SET('marca',                            $_REQUEST['marca']);
            $alm->__SET('precio_unitario',                  $_REQUEST['precio_unitario']);
			$alm->__SET('ubicacion',                        $_REQUEST['ubicacion']);

            $model->registrar($alm);
            echo "Guardo el Registro Exitosamente";

			//header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idelectrodomesticos']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idelectrodomesticos']);
            break;
    }
}

?>