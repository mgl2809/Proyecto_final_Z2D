<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class credito {

    private $id;
    private $clave;
    private $nombre;
    private $creditos;

    public function __construct() {
        
    }

    public function setclave($clave) {
        $this->clave = $clave;
    }

    public function setid($id1) {
        $this->id = $id1;
    }

    public function setcreditos($c) {
        $this->creditos = $c;
    }

    public function setnombre($nombre1) {
        $this->nombre = $nombre1;
    }

    public function getid() {
        return $this->id;
    }

    public function getcreditos() {
        return $this->creditos;
    }

    public function getnombre() {
        return $this->nombre;
    }

    public function getclave() {
        return $this->clave;
    }

}

?>
