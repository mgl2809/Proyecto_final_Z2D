<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class programa
{

    private $id;
    private $nombre;
	private $descripcion;
    private $caracteristicas;
	private $categoria;
	private $monto;
	private $estatus;
 
    public function __construct(){

    }
    public function setdescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function getdescripcion(){
        return $this->ubicacion;
    }
	public function setcaracteristicas($caracteristicas){
        $this->caracteristicas = $caracteristicas;
    }
	public function getcaracteristicas(){
        return $this->caracteristicas;
    }
    public function setid($id1){
        $this->id = $id1;
    }
	public function getid(){
        return $this->id;
    }
    public function setnombre($nombre1){
        $this->nombre = $nombre1;
    }
	public function getnombre(){
        return $this->nombre;
    }
	  public function setcategoria($categoria){
        $this->categoria = $categoria;
    }
	public function getcategoria(){
        return $this->categoria;
    }
	  public function setmonto($monto){
        $this->monto = $monto;
    }
	public function getmonto(){
        return $this->monto;
    }  public function setestatus($estatus){
        $this->estatus = $estatus;
    }
	public function getestatus(){
        return $this->categoria;
    }
    

}

?>
