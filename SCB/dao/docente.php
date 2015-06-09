<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class docente
{

    private $id;
    private $nombre;
    private $idusuario;

    public function __construct(){

    }
    public function setidusuario($idusuario){
        $this->idusuario = $idusuario;
    }
    
    public function getidusuario(){
        return $this->idusuario;
    }
    public function setid($id1){
        $this->id = $id1;
    }

    public function setnombre($nombre1){
        $this->nombre = $nombre1;
    }

    public function getid(){
        return $this->id;
    }

    public function getnombre(){
        return $this->nombre;
    }

}

?>
