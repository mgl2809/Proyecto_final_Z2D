<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class periodo {

    private $id;
    private $nombre;

    public function __construct() {
        
    }

//Asignacion de Datos
    public function setid($id) {
        $this->id = $id;
    }

    public function setnombre($nombre) {
        $this->nombre = $nombre;
    }

//Regreso de Datos
    public function getid() {
        return $this->id;
    }

    public function getnombre() {
        return $this->nombre;
    }

}

?>
