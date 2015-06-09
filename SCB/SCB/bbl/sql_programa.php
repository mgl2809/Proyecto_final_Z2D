<?php

/**
 *
 * @Clase para validar el acceso al sistema. "sql_acceso.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
include_once("../../dao/conexion.php");
include_once("../../dao/programa.php");

class sql_programa {

    public function __construct() {
        
    }

    //mostrar todos los docentes del sistema
    public function ListarDocentes() {


        $docentes = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_docentes = $Conexion->ejecutar("select * from programa order by nombre");
        $i = 0;
        while ($renglon = mysql_fetch_array($lista_docentes)) {
            $objeto = new docente();
            $objeto->setid($renglon['id_programa']);
            $objeto->setidusuario($renglon['nombre_programa']);
            $objeto->setnombre($renglon['descripcion']);

            array_push($docentes, $objeto);
        }

        $Conexion->desconectarse();
        return $docentes;
    }

    public function ListarDocentesBuscados($nombre) {


        $docentes = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_docentes = $Conexion->ejecutar("select * from docente where nombre like '%" . $nombre . "%';");
        $i = 0;
        while ($renglon = mysql_fetch_array($lista_docentes)) {
            $objeto = new docente();
            $objeto->setid($renglon['idDocente']);
            $objeto->setidusuario($renglon['usuario_idusuario']);
            $objeto->setnombre($renglon['nombre']);

            array_push($docentes, $objeto);
        }

        $Conexion->desconectarse();
        return $docentes;
    }

    public function BusacarDocente($id) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $docentes = $Conexion->ejecutar("SELECT * FROM docente where idDocente = '" . $id . "';");


        if ($renglon = mysql_fetch_array($docentes)) {
            $objeto = new docente();
            $objeto->setid($renglon['idDocente']);
            $objeto->setnombre($renglon['nombre']);
        }

        $Conexion->desconectarse();
        return $objeto;
    }

    //seleccionar docente para modificar
    public function SelectDocente($id) {

        $docentes = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $list_docentes = $Conexion->ejecutar("SELECT * FROM docente where idDocente = '" . $id . "';");
        
        while ($renglon = mysql_fetch_array($list_docentes)){
            $objeto = new docente();
            $objeto->setid($renglon['idDocente']);
            $objeto->setidusuario($renglon['usuario_idusuario']);
            $objeto->setnombre($renglon['nombre']);

            array_push($docentes, $objeto);
        }

        $Conexion->desconectarse();
        return $docentes;
    }

    //registrar un nuevo docente
    public function SaveDocente($mDocente) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("INSERT INTO docente (idDocente ,usuario_idusuario ,nombre) VALUES('" . $mDocente->getid() . "'," . $mDocente->getidusuario() . ",'" . $mDocente->getnombre() . "');");

        $Conexion->desconectarse();
    }

    //borrar un docente
    public function DeleteDocente($id) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("DELETE FROM docente where idDocente = " . $id . ";");

        $Conexion->desconectarse();
    }

    //modificar los datos de un docente
    public function UpdateDocente($objeto) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("UPDATE docente set nombre='" . $objeto->getnombre() . "', usuario_idusuario = " . $objeto->getidusuario() . "
					where idDocente = " . $objeto->getid() . ";");

        $Conexion->desconectarse();
    }

}

?>
