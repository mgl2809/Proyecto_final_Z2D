<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class carrera {

    private $dep;
    private $id;
    private $nombre;

    public function __construct() {
        
    }

//Asignacion de Datos

    public function setdep($dep) {
        $this->dep = $dep;
    }

    public function setid($id) {
        $this->id = $id;
    }

    public function setnombre($nombre) {
        $this->nombre = $nombre;
    }

//Regreso de Datos

    public function getdep() {
        return $this->dep;
    }

    public function getid() {
        return $this->id;
    }

    public function getnombre() {
        return $this->nombre;
    }

}

?>
