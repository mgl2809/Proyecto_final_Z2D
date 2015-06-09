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

class sql_periodo {

    public function __construct() {
        
    }

    public function periodoActual() {



        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_periodo = $Conexion->ejecutar("select idPeriodo from periodo where actual = 1;");
        $i = 0;
        while ($renglon = mysql_fetch_array($lista_periodo)) {

            $periodo = $renglon['idPeriodo'];
        }

        $Conexion->desconectarse();
        return $periodo;
    }

}

?>
