<?php

/**
 *
 * @Clase para validar el acceso al sistema. "sql_acceso.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
include_once("../../dao/conexion.php");
include_once("../../dao/carrera.php");

class sql_carrera {

    public function __construct() {
        
    }

    public function ListarCarreras() {


        $carreras = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_docentes = $Conexion->ejecutar("SELECT idCarrera, nombre, dep FROM carrera where activa=1;");
        $i = 0;
        while ($renglon = mysql_fetch_array($lista_docentes)) {
            $objeto = new carrera();
            $objeto->setid($renglon['idCarrera']);
            $objeto->setnombre($renglon['nombre']);
            $objeto->setdep($renglon['dep']);

            array_push($carreras, $objeto);
        }

        $Conexion->desconectarse();
        return $carreras;
    }
    
   public function ListarCarrerasDatos(){
    
        $carreras = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_carrera = $Conexion->ejecutar("SELECT idCarrera AS id, nombre FROM carrera order by id;");
        $i = 0;
        while ($renglon = mysql_fetch_array($lista_carrera)) {
            $objeto = new carrera();
            
            $objeto->setid($renglon['id']);
            $objeto->setnombre($renglon['nombre']);
            
            array_push($carreras, $objeto);
        }

        $Conexion->desconectarse();
        return $carreras;
   } 

}

?>
