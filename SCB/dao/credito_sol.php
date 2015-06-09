<?php

/**
 *
 * @Clase para almacenar el credito. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class credito_sol {

    private $id;
    private $alumno;
    private $periodo;
    private $credito;
    private $docente;
    private $fechas;
    private $fechaa;
    private $fechal;
    private $valor;
    private $edo;
    private $carrera;
    private $anio;
    private $desc;

    public function __construct() {
        
    }

    public function setdescripcion($valor) {
        $this->desc = $valor;
    }

    public function setcarrera($valor) {
        $this->carrera = $valor;
    }

    public function setanio($edo) {
        $this->anio = $edo;
    }

    public function setvalor($valor) {
        $this->valor = $valor;
    }

    public function setedo($edo) {
        $this->edo = $edo;
    }

    public function setalumno($alumno) {
        $this->alumno = $alumno;
    }

    public function setid($id1) {
        $this->id = $id1;
    }

    public function setcredito($c) {
        $this->credito = $c;
    }

    public function setperiodo($periodo) {
        $this->periodo = $periodo;
    }

    public function setdocente($docente) {
        $this->docente = $docente;
    }

    public function setfechas($fecha) {
        $this->fechas = $fecha;
    }

    public function setfechau($fecha) {
        $this->fechau = $fecha;
    }

    public function setfechal($fecha) {
        $this->fechal = $fecha;
    }

    public function getalumno() {
        return $this->alumno;
    }

    public function getid() {
        return $this->id;
    }

    public function getcredito() {
        return $this->credito;
    }

    public function getperiodo() {
        return $this->periodo;
    }

    public function getdocente() {
        return $this->docente;
    }

    public function getfechas() {
        return $this->fechas;
    }

    public function getfechau() {
        return $this->fechau;
    }

    public function getfechal() {
        return $this->fechal;
    }

    public function getvalor() {
        return $this->valor;
    }

    public function getedo() {
        return $this->edo;
    }

    public function getcarrera() {
        return $this->carrera;
    }

    public function getanio() {
        return $this->anio;
    }

    public function getdescripcion() {
        return $this->desc;
    }

}

?>
