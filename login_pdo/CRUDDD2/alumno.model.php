<?php

class AlumnoModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM electrodomesticos");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new electrodomestico();

                $alm->__SET('idelectrodomesticos', $r->idelectrodomesticos);
                $alm->__SET('nombre', $r->nombre);
                $alm->__SET('tipo', $r->tipo);
                $alm->__SET('marca', $r->marca);
                $alm->__SET('precio_unitario', $r->precio_unitario);
				$alm->__SET('ubicacion', $r->ubicacion);

                $result[] = $alm;
            }

            return $result;
			
				
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($idelectrodomesticos)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM electrodomesticos WHERE idelectrodomesticos = ?");
                      

            $stm->execute(array($idelectrodomesticos));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new electrodomestico();

            $alm->__SET('idelectrodomesticos', $r->idelectrodomesticos);
            $alm->__SET('nombre', $r->nombre);
            $alm->__SET('tipo', $r->tipo);
            $alm->__SET('marca', $r->marca);
            $alm->__SET('precio_unitario', $r->precio_unitario);
			$alm->__SET('ubicacion', $r->ubicacion);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($idelectrodomesticos)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM electrodomesticos WHERE idelectrodomesticos = ?");                      

            $stm->execute(array($idelectrodomesticos));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(electrodomestico $data)
    {
        try 
        {
            $sql = "UPDATE electrodomesticos SET 
                        nombre          = ?, 
                        tipo        = ?,
                        marca            = ?, 
                        precio_unitario = ?,
						ubicacion   =    ?
                    WHERE idelectrodomesticos = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('nombre'), 
                    $data->__GET('tipo'), 
                    $data->__GET('marca'),
                    $data->__GET('precio_unitario'),
					$data->__GET('ubicacion'),
                    $data->__GET('idelectrodomesticos')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function registrar(electrodomestico $data)
    {
        try 
        {
        $sql = "INSERT INTO electrodomesticos (idelectrodomesticos, nombre,tipo,marca,precio_unitario, ubicacion) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('idelectrodomesticos'), 
				$data->__GET('nombre'), 
                $data->__GET('tipo'), 
                $data->__GET('marca'),
                $data->__GET('precio_unitario'),
				$data->__GET('ubicacion')
				
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>

