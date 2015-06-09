<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class detalleboleta {

    private $nc;
    private $grupo;
    private $clave;
    private $nombre;
    private $creditos;
    private $califiacion;
    private $oportunidad;

    public function __construct() {
        
    }

//Asignacion de Datos
    public function setnc($nc) {
        $this->nc = $nc;
    }

    public function setgrupo($grupo) {
        $this->grupo = $grupo;
    }

    public function setclave($clave) {
        $this->clave = $clave;
    }

    public function setnombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setcreditos($credito) {
        $this->creditos = $credito;
    }

    public function setcalifiacion($calificaion) {
        $this->califiacion = $calificaion;
    }

    public function setoportunidad($oportunidad) {
        $this->oportunidad = $oportunidad;
    }

//Regreso de Datos
    public function getnc() {
        return $this->nc;
    }

    public function getgrupo() {
        return $this->grupo;
    }

    public function getclave() {
        return $this->clave;
    }

    public function getnombre() {
        return $this->nombre;
    }

    public function getcreditos() {
        return $this->creditos;
    }

    public function getcalificacion() {
        return $this->califiacion;
    }

    public function getoportunidad() {
        return $this->oportunidad;
    }

}

?>
