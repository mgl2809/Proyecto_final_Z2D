<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sql_materia
 *
 * @author Casas
 */
include_once ('../../dao/materia.php');
include_once ('../../dao/conexion.php');

class sql_materia {

    //put your code here

    public function __construct() {
        
    }

    //registrar materia
    public function SaveMateria($mMateria) {


        $Conexion = conectar_bd();
        $Conexion->conectarse();
        $Conexion->ejecutar("INSERT INTO materia (nombre, creditos, h_practicas, h_teoricas, clave, nombre_corto,
          carrera_dep, ret_cvo, semestre, unidades)VALUES('" . $mMateria->getnombre() . "'," . $mMateria->getcreditos() . "," . $mMateria->gethpracticas() . ",
          " . $mMateria->gethteoricas() . ",'" . $mMateria->getclave() . "','" . $mMateria->getnomcorto() . "'," . $mMateria->getcarrera_dep() . "
          ,'" . $mMateria->getret_cvo() . "'," . $mMateria->getsemestre() . "," . $mMateria->getunidades() . ");");

        $Conexion->desconectarse();
    }

    //mostrar todas las materias
    public function ListarMaterias() {


        $materias = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_materias = $Conexion->ejecutar("select idMateria, nombre, creditos, clave, semestre, unidades from materia order by nombre");
        $i = 0;
        while ($renglon = mysql_fetch_array($lista_materias)) {
            $objeto = new materia();
            $objeto->setid($renglon['idMateria']);
            $objeto->setnombre($renglon['nombre']);
            $objeto->setcreditos($renglon['creditos']);
            $objeto->setclave($renglon['clave']);
            $objeto->setsemestre($renglon['semestre']);
            $objeto->setunidades($renglon['unidades']);


            array_push($materias, $objeto);
        }

        $Conexion->desconectarse();
        return $materias;
    }

    //borrar una materia
    public function DeleteMateria($id) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("DELETE FROM materia where idMateria = '" . $id . "';");

        $Conexion->desconectarse();
    }

    //buscar una materia por nombre
    public function ListarMateriasBuscadas($nombre) {

        $materias = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_materias = $Conexion->ejecutar("select idMateria, nombre, creditos, clave, semestre, unidades from materia where nombre like  '%" . $nombre . "%';");
        $i = 0;
        while ($renglon = mysql_fetch_array($lista_materias)) {
            $objeto = new materia();
            $objeto->setid($renglon['idMateria']);
            $objeto->setnombre($renglon['nombre']);
            $objeto->setcreditos($renglon['creditos']);
            $objeto->setclave($renglon['clave']);
            $objeto->setsemestre($renglon['semestre']);
            $objeto->setunidades($renglon['unidades']);


            array_push($materias, $objeto);
        }

        $Conexion->desconectarse();
        return $materias;
    }

    //selecionar una materia para modificarla
    public function SelectMateria($id) {

        $materias = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_materias = $Conexion->ejecutar("select * from materia where idMateria = " . $id . ";");
        
        while ($renglon = mysql_fetch_array($lista_materias)) {
            $objeto = new materia();
            $objeto->setid($renglon['idMateria']);
            $objeto->setnombre($renglon['nombre']);
            $objeto->setcreditos($renglon['creditos']);
            $objeto->sethpracticas($renglon['h_practicas']);
            $objeto->sethteoricas($renglon['h_teoricas']);
            $objeto->setclave($renglon['clave']);
            $objeto->setnomcorto($renglon['nombre_corto']);
            $objeto->setcarrera_dep($renglon['carrera_dep']);
            $objeto->setret_cvo($renglon['ret_cvo']);
            $objeto->setsemestre($renglon['semestre']);
            $objeto->setunidades($renglon['unidades']);


            array_push($materias, $objeto);
        }

        $Conexion->desconectarse();
        return $materias;
    }

    //actualizar los datos de una materia
    public function UpdateMateria($objeto) {
        
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("UPDATE materia set nombre ='" . $objeto->getnombre() . "',creditos = " . $objeto->getcreditos() . ",h_practicas = " . $objeto->gethpracticas() . ",
  				h_teoricas =" . $objeto->gethteoricas() . ",clave ='" . $objeto->getclave() . "',nombre_corto ='" . $objeto->getnomcorto() . "',carrera_dep =" . $objeto->getcarrera_dep() . ",
                ret_cvo ='" . $objeto->getret_cvo() . "',semestre =" . $objeto->getsemestre() . ",unidades =" . $objeto->getunidades() . " where idMateria = " . $objeto->getid() . ";");


        $Conexion->desconectarse();
    }

}

?>
