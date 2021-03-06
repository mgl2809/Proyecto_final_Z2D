<?php

/**
 *
 * @Clase para validar el acceso al sistema. "sql_acceso.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
include_once("../../dao/conexion2.php");
include_once("../../dao/programa.php");

class sql_programa {

    public function __construct() {
        
    }

    //mostrar todos los docentes del sistema
    public function ListarDocentes() {


        $docentes = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_docentes = $Conexion->ejecutar("select * from programa order by id_programa");
        $i = 0;
        while ($renglon = mysql_fetch_array($lista_docentes)) {
            $objeto = new programa();
            $objeto->setid_programa($renglon['id_programa']);
            $objeto->setdescripcion($renglon['descripcion']);
            $objeto->setcaracteristicas($renglon['caracteristicas']);
			$objeto->setnombre_programa($renglon['nombre_programa']);
			 $objeto->setcategoria($renglon['categoria']);
            $objeto->setmonto($renglon['monto']);
            $objeto->setestatus($renglon['estatus']);
			$objeto->setconvocatoria($renglon['convocatoria']);

            array_push($docentes, $objeto);
        }

        $Conexion->desconectarse();
        return $docentes;
    }

    public function ListarDocentesBuscados($nombre) {

        $docentes = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();
        $lista_docentes = $Conexion->ejecutar("select id_programa, nombre_programa, descripcion, caracteristicas, categoria, monto, estatus, convocatoria from programa where nombre_programa like '%" . $nombre . "%';");
        $i = 0;
        while ($renglon = mysql_fetch_array($lista_docentes)) {
            $objeto = new programa();
             $objeto->setid_programa($renglon['id_programa']);
			 $objeto->setnombre_programa($renglon['nombre_programa']);
            $objeto->setdescripcion($renglon['descripcion']);
			$objeto->setcaracteristicas($renglon['caracteristicas']);
			$objeto->setcategoria($renglon['categoria']);
			$objeto->setestatus($renglon['monto']);
			$objeto->setmonto($renglon['estatus']);
			$objeto->setconvocatoria($renglon['convocatoria']);
		        array_push($docentes, $objeto);
        }
        $Conexion->desconectarse();
        return $docentes;
    }

    public function BusacarDocente($id) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $docentes = $Conexion->ejecutar("SELECT id_dependencia, nombre, ubicacion, responsable FROM dependencia where nombre = '" . $id . "';");


        if ($renglon = mysql_fetch_array($docentes)) {
            $objeto = new dependencia();
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

        $list_docentes = $Conexion->ejecutar("select id_programa, nombre_programa, descripcion, caracteristicas, categoria, monto, estatus, convocatoria from programa where nombre_programa like '%" . $id . "%';");
        
        while ($renglon = mysql_fetch_array($list_docentes)){
            $objeto = new programa();
   		    $objeto->setid_programa($renglon['id_programa']);
			$objeto->setnombre_programa($renglon['nombre_programa']);
            $objeto->setdescripcion($renglon['descripcion']);
			$objeto->setcaracteristicas($renglon['caracteristicas']);
			$objeto->setcategoria($renglon['categoria']);
			$objeto->setestatus($renglon['monto']);
			$objeto->setmonto($renglon['estatus']);
			$objeto->setconvocatoria($renglon['convocatoria']);
           
            array_push($docentes, $objeto);
        }

        $Conexion->desconectarse();
        return $docentes;
    }

    //registrar un nuevo docente
    public function SaveDocente($mDocente) {
		$Conexion = conectar_bd();
        $Conexion->conectarse();
			
     	$Conexion->ejecutar("INSERT INTO programa (nombre_programa, descripcion, caracteristicas, categoria, monto, estatus, convocatoria) 
		VALUES('" . $mDocente->getnombre_programa() . "','".$mDocente->getdescripcion()."', '" . $mDocente->getcaracteristicas() . "', '" . $mDocente->getcategoria() . "', '" . $mDocente->getmonto() . "', '" . $mDocente->getestatus() . "', '" . $mDocente->getconvocatoria() . "');");
		
		$Conexion->desconectarse();
    }

    //borrar un docente
    public function DeleteDocente($id) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("DELETE FROM dependencia where id_dependencia = " . $id . ";");

        $Conexion->desconectarse();
    }

    //modificar los datos de un docente
    public function UpdateDocente($objeto) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();
		$Conexion->ejecutar("UPDATE dependencia set nombre= '".$objeto->getnombre()."', ubicacion = '".$objeto->getresponsable()."', responsable ='".$objeto->getidusuario()."' where id_dependencia = " .$objeto->getid().";");
		$Conexion->desconectarse();
    }

}

?>
