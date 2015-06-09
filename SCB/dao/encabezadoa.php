<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class encabezadoa {

    private $id;
    private $nombre;
    private $nc;
    private $creditos;
    private $semestre;
    private $especialidad;
    private $carrera;

    public function __construct() {
        
    }

//Asignacion de Datos

    public function setid($id) {
        $this->id = $id;
    }

    public function setcarrera($id) {
        $this->carrera = $id;
    }

    public function setnombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setnc($nc) {
        $this->nc = $nc;
    }

    public function setcreditos($credito) {
        $this->creditos = $credito;
    }

    public function setsemestre($semestre) {
        $this->semestre = $semestre;
    }

    public function setespecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }

//Regreso de Datos

    public function getid() {
        return $this->id;
    }

    public function getcarrera() {
        return $this->carrera;
    }

    public function getnombre() {
        return $this->nombre;
    }

    public function getnc() {
        return $this->nc;
    }

    public function getcreditos() {
        return $this->creditos;
    }

    public function getsemestre() {
        return $this->semestre;
    }

    public function getespecialidad() {
        return $this->especialidad;
    }

}

?>
