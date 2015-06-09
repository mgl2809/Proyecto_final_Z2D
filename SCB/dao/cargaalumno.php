<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class cargaalumno {

    private $idCarga;
    private $materia;
    private $docente;
    private $clave;
    private $grupo;
    private $creditos;

    public function __construct() {
        
    }

    public function setidcarga($id1) {
        $this->idCarga = $id1;
    }

    public function setmateria($materia1) {
        $this->materia = $materia1;
    }

    public function setdocente($docente) {
        $this->docente = $docente;
    }

    public function setclave($clave) {
        $this->clave = $clave;
    }

    public function setgrupo($grupo) {
        $this->grupo = $grupo;
    }

    public function setcreditos($creditos) {
        $this->creditos = $creditos;
    }

//Regresa Los valores
    public function getidcarga() {
        return $this->idCarga;
    }

    public function getmateria() {
        return $this->materia;
    }

    public function getdocente() {
        return $this->docente;
    }

    public function getclave() {
        return $this->clave;
    }

    public function getgrupo() {
        return $this->grupo;
    }

    public function getcreditos() {
        return $this->creditos;
    }

}

?>
