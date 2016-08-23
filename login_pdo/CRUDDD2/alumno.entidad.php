<?php

class electrodomestico
{
    private $idelectrodomesticos;
    private $nombre;
    private $tipo;
    private $marca;
    private $precio_unitario;
	private $ubicacion;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
