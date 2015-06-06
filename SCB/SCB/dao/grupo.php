<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class grupo {

    private $id;
    private $materia;
    private $carrera;
    private $nombre;
    private $semestre;

    public function __construct() {
        
    }

    public function setid($id1) {
        $this->id = $id1;
    }

    public function setmateria($materia) {
        $this->materia = $materia;
    }

    public function setcarrera($carrera) {
        $this->carrera = $carrera;
    }

    public function setnombre($nombre1) {
        $this->nombre = $nombre1;
    }

    public function setsemestre($semestre) {
        $this->semestre = $semestre;
    }

//----------------------------------------------------------
    public function getid() {
        return $this->id;
    }

    public function getmateria() {
        return $this->materia;
    }

    public function getcarrera() {
        return $this->carrera;
    }

    public function getnombre() {
        return $this->nombre;
    }

    public function getsemestre() {
        return $this->semestre;
    }

}

?>
