<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class listaboleta {

    private $nc;

    public function __construct() {
        
    }

//Asignacion de Datos

    public function setnc($nc) {
        $this->nc = $nc;
    }

//Regreso de Datos

    public function getnc() {
        return $this->nc;
    }

}

?>
