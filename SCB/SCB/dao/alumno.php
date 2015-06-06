<?php

/**
 *
 * @Clase para validar el acceso al sistema. "docente.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class alumno {

    private $id;
    private $nc;
    private $nombre;
    private $sem;
    private $id_info;
    private $especialidad;
    private $estatus;
    private $curp;
    private $sexo;
    private $fecha_nacimiento;
    private $direccion;
    private $telefono;
    private $correo;
    private $ns_social;
    private $tutor;
    private $id_usuario;
    private $edo_civil;
    private $periodo;
    private $anio;
    
    public function __construct() {
        
    }
    
    public function setedocivil($edo_civil){
        $this->edo_civil = $edo_civil;
    }
    
    public function getedocivil(){
        return $this->edo_civil;
    }
    
    public function setperiodo($periodo){
        $this->periodo = $periodo;
    }
    
    public function getperiodo(){
        return $this->periodo;
    }
    
    public function setanio($anio){
        $this->anio = $anio;
    }
    
    public function getanio(){
        return $this->anio;
    }

    public function setid($id1) {
        $this->id = $id1;
    }
    
    public function getid() {
        return $this->id;
    }
    
    public function setidusuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    
    public function getidusuario(){
        return $this->id_usuario;
    }

    public function setnc($nc) {
        $this->nc = $nc;
    }

    public function getnc() {
        return $this->nc;
    }
    
    public function setsem($sem) {
        $this->sem = $sem;
    }

    public function getsem() {
        return $this->sem;
    }
    
    public function setnombre($nombre1) {
        $this->nombre = $nombre1;
    }

    public function getnombre() {
        return $this->nombre;
    }

    public function setidinfo($id_info){
        $this->id_info = $id_info;
    }
    
    public function getidinfo(){
        return $this->id_info;
    }
    
    public function setespecialidad($especialidad){
        $this->especialidad = $especialidad;
    }
    
    public function getespecialidad(){
        return $this->especialidad;
    }
    
    public function setestatus($estatus){
        $this->estatus = $estatus;
    }
    
    public function getestatus(){
        return $this->estatus;
    }
    public function setcurp($curp){
        $this->curp = $curp;
    }
    
    public function getcurp(){
        return $this->curp;
    }
    
    public function setsexo($sexo){
        $this->sexo = $sexo;
    }
    
    public function getsexo(){
        return $this->sexo;
    }
    
    public function setfechanacimiento($fecha_nacimiento){
        $this-> fecha_nacimiento = $fecha_nacimiento;
    }
    
    public function getfechanacimiento(){
        return $this->fecha_nacimiento;
    }
    
    public function setdireccion($direccion){
        $this->direccion = $direccion;        
    }
    
    public function getdireccion(){
        return $this->direccion;
    }
    
    public function settelefono($telefono){
        $this->telefono = $telefono;
    }
    
    public function gettelefono(){
        return $this->telefono;
    }
    
    public function setcorreo($correo){
        $this->correo = $correo;
    }
    
    public function getcorreo(){
        return $this->correo;
    }
    
    public function setnssocial($ns_social){
        $this->ns_social = $ns_social;
    }
    
    public function getnssocial(){
        return $this->ns_social;        
    }
    
    public function settutor($tutor){
        $this->tutor = $tutor;
    }
    
    public function gettutor(){
        return $this->tutor;
    }

}

?>
