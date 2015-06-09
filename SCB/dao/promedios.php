<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class promedios {

    private $nc;
    private $clave;
    private $grupo;
    private $semestre;
    private $promedio;
    private $oportunidad;
    private $carrera;

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

    public function setsemestre($semestre) {
        $this->semestre = $semestre;
    }

    public function setpromedio($promedio) {
        $this->promedio = $promedio;
    }

    public function setoportunidad($oportunidad) {
        $this->oportunidad = $oportunidad;
    }

    public function setcarrera($carrera) {
        $this->carrera = $carrera;
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

    public function getsemestre() {
        return $this->semestre;
    }

    public function getpromedio() {
        return $this->promedio;
    }

    public function getoportunidad() {
        return $this->oportunidad;
    }

    public function getcarrera() {
        return $this->carrera;
    }

}

?>
