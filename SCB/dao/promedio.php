<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class promedio {

    private $nc;
    private $clave;
    private $promedio;
    private $grupo;

    public function __construct() {
        
    }

//Asignacion de Datos

    public function setnc($nc) {
        $this->nc = $nc;
    }

    public function setclave($clave) {
        $this->clave = $clave;
    }

    public function setgrupo($grupo) {
        $this->grupo = $grupo;
    }

    public function setpromedio($promedio) {
        $this->promedio = $promedio;
    }

//Regreso de Datos

    public function getnc() {
        return $this->nc;
    }

    public function getclave() {
        return $this->clave;
    }

    public function getgrupo() {
        return $this->grupo;
    }

    public function getpromedio() {
        return $this->promedio;
    }

}

?>
