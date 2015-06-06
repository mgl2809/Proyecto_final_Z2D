<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class datosC2 {

    private $actividad;
    private $docente;
    private $periodo;
    private $idperiodo;
    private $valor;

    public function __construct() {
        
    }

    public function setvalor($a) {
        $this->valor = $a;
    }

    public function setidperiodo($a) {
        $this->idperiodo = $a;
    }

    public function setactividad($a) {
        $this->actividad = $a;
    }

    public function setdocente($d) {
        $this->docente = $d;
    }

    public function setperiodo($f) {
        $this->periodo = $f;
    }

    public function getactividad() {
        return $this->actividad;
    }

    public function getdocente() {
        return $this->docente;
    }

    public function getperiodo() {
        return $this->periodo;
    }

    public function getidperiodo() {
        return $this->idperiodo;
    }

    public function getvalor() {
        return $this->valor;
    }

}

?>
