<?php

/**
 *
 * @Clase para validar el acceso al sistema. "materia.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class materia {

    private $id;
    private $nombre;
    private $creditos;
    private $hteoricas;
    private $hpracticas;
    private $clave;
    private $nomcorto;
    //private $carrera;
    private $carrera_dep;
    private $ret_cvo;
    //private $retclave;
    private $semestre;
    private $unidades;

    public function __construct() {
        
    }

    public function setid($id1) {
        $this->id = $id1;
    }

    public function getid() {
        return $this->id;
    }

    public function setnombre($nombre1) {
        $this->nombre = $nombre1;
    }

    public function getnombre() {
        return $this->nombre;
    }

    public function setcreditos($credito) {
        $this->creditos = $credito;
    }

    public function getcreditos() {
        return $this->creditos;
    }

    public function sethteoricas($ht) {
        $this->hteoricas = $ht;
    }

    public function gethteoricas() {
        return $this->hteoricas;
    }

    public function sethpracticas($hp) {
        $this->hpracticas = $hp;
    }

    public function gethpracticas() {
        return $this->hpracticas;
    }

    public function setclave($cve) {
        $this->clave = $cve;
    }

    public function getclave() {
        return $this->clave;
    }

    public function setnomcorto($nomcorto) {
        $this->nomcorto = $nomcorto;
    }

    public function getnomcorto() {
        return $this->nomcorto;
    }

    public function setcarrera_dep($carrera_dep) {
        $this->carrera_dep = $carrera_dep;
    }

    public function getcarrera_dep() {
        return $this->carrera_dep;
    }

    public function setret_cvo($ret_cvo) {
        $this->ret_cvo = $ret_cvo;
    }

    public function getret_cvo() {
        return $this->ret_cvo;
    }

    public function setsemestre($semestre) {
        $this->semestre = $semestre;
    }

    public function getsemestre() {
        return $this->semestre;
    }

    public function setunidades($unidades) {
        $this->unidades = $unidades;
    }

    public function getunidades() {
        return $this->unidades;
    }

    /*   public function setretclave($retclave)
      {
      $this->retclave = $retclave;
      }

      public function getretclave()
      {
      return $this->retclave;
      } */

    //  public function setcarerra($carerra)
//    {
//        $this->carrera = $carrera;
//    }
    //  public function getcarrera()
//    {
//        return $this->carrera;
//    }
//
}

?>
