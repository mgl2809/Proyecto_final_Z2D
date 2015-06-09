<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class datosC1 {

    private $fecha;
    private $division;
    private $nombre;

    public function __construct() {
        
    }

    public function setdivision($clave) {
        $this->division = $clave;
    }

    public function setfecha($id1) {
        $this->fecha = $id1;
    }

    public function setnombre($nombre1) {
        $this->nombre = $nombre1;
    }

    public function getfecha() {
        return $this->fecha;
    }

    public function getdivision() {
        return $this->division;
    }

    public function getnombre() {
        return $this->nombre;
    }

}

?>
