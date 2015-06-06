<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class cargadocente {

    private $idgrupo;
    private $materia;
    private $clave;
    private $grupo;
    private $carrera;

    public function __construct() {
        
    }

    public function setidgrupo($id1) {
        $this->idgrupo = $id1;
    }

    public function setmateria($materia1) {
        $this->materia = $materia1;
    }

    public function setclave($clave) {
        $this->clave = $clave;
    }

    public function setgrupo($grupo) {
        $this->grupo = $grupo;
    }

    public function setcarrera($carrera) {
        $this->carrera = $carrera;
    }

    public function getid() {
        return $this->idgrupo;
    }

    public function getmateria() {
        return $this->materia;
    }

    public function getclave() {
        return $this->clave;
    }

    public function getgrupo() {
        return $this->grupo;
    }

    public function getcarrera() {
        return $this->carrera;
    }

}

?>
