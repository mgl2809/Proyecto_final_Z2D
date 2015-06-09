<?php

/**
 *
 * @Clase para validar el acceso al sistema. "sql_acceso.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
require_once('../../dao/conexion.php');
require_once('../../dao/promedios.php');
require_once('../../dao/promedio.php');
require_once('../../dao/carrera.php');

class sql_proemdios {

    public function __construct() {
        
    }

    //Determina el Encabezado de la Carga de un Alumno
    public function CarreraDisponible() {

        $carreras = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar(" SELECT dep FROM carrera where activa = 1;");


        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new carrera();
            $objeto->setdep($renglon['dep']);

            array_push($carreras, $objeto);
        }
        $Conexion->desconectarse();
        return $carreras;
    }

    public function EncabezadoProm($dep) {

        $encabezado = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar(" select alumno.no_control, materia.clave, 
            grupo.grupo, materia.semestre, max(oportunidad) as oportunidad, carrera.idCarrera
            from ((((((usuario inner join alumno on usuario.idusuario=alumno.usuario_idusuario)
            inner join lista_alumnos on alumno.idalumno=lista_alumnos.alumno_idalumno)
            inner join carga on lista_alumnos.Carga_idCarga=carga.idcarga) 
            inner join evaluacion on lista_alumnos.idlista_alumno=evaluacion.Lista_alumnos_idLista_alumno)
            inner join docente on carga.docente_iddocente=docente.idDocente)
            inner join materia on carga.materia_idmateria=materia.idmateria)
            inner join info_materia on info_materia.materia_idmateria=materia.idmateria
            inner join grupo on grupo.nombre =materia.clave
            inner join carrera on carrera.dep = materia.carrera_dep
            where carrera.dep = " . $dep . "
            group by no_control,clave;");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new promedios();
            $objeto->setnc($renglon['no_control']);
            $objeto->setclave($renglon['clave']);
            $objeto->setgrupo($renglon['grupo']);
            $objeto->setsemestre($renglon['semestre']);
            $objeto->setoportunidad($renglon['oportunidad']);
            $objeto->setcarrera($renglon['idCarrera']);

            array_push($encabezado, $objeto);
        }
        $Conexion->desconectarse();
        return $encabezado;
    }

    public function MateriaPromedio($dep) {

        $calificaciones = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado1 = $Conexion->ejecutar(" select alumno.no_control, 
            materia.clave, if(max(promedio)> 69, max(promedio),0) as promedio_unidad 
            from ((((((usuario inner join alumno on usuario.idusuario=alumno.usuario_idusuario) 
            inner join lista_alumnos on alumno.idalumno=lista_alumnos.alumno_idalumno) 
            inner join carga on lista_alumnos.Carga_idCarga=carga.idcarga) 
            inner join evaluacion on lista_alumnos.idlista_alumno=evaluacion.Lista_alumnos_idLista_alumno) 
            inner join docente on carga.docente_iddocente=docente.idDocente)  										
            inner join materia on carga.materia_idmateria=materia.idmateria) 
            inner join info_materia on info_materia.materia_idmateria=materia.idmateria
            inner join grupo on grupo.nombre =materia.clave
            inner join carrera on carrera.dep = materia.carrera_dep
            where carrera.dep = " . $dep . " 
            group by no_control,clave,unidad;");


        while ($renglon1 = mysql_fetch_row($Encabezado1)) {
            $objeto = new promedio();
            $objeto->setnc($renglon1[0]);
            $objeto->setclave($renglon1[1]);
            $objeto->setpromedio($renglon1[2]);


            array_push($calificaciones, $objeto);
        }

        $Conexion->desconectarse();
        return $calificaciones;
    }

    public function EscribirBD($mpromedios) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();
        $Conexion->ejecutar("delete from final;") or die(mysql_error());

        $result = count($mpromedios);
        $cadena = "INSERT INTO final (no_control,clave,grupo,promedio,oportunidad,idCarrera,semestre) VALUES ";
        $i = 1;
        foreach ($mpromedios as $Lista) {
            if ($i == $result) {
                $cadena = $cadena . "('" . $Lista->getnc() . "','" . $Lista->getclave() . "','" . $Lista->getgrupo() . "'," . $Lista->getpromedio() . "," . $Lista->getoportunidad() . "," . $Lista->getcarrera() . "," . $Lista->getsemestre() . ");";
            } else {
                $cadena = $cadena . "('" . $Lista->getnc() . "','" . $Lista->getclave() . "','" . $Lista->getgrupo() . "'," . $Lista->getpromedio() . "," . $Lista->getoportunidad() . "," . $Lista->getcarrera() . "," . $Lista->getsemestre() . "),";
            }
            $i++;
        }
        echo $cadena;

        $Conexion->ejecutar("$cadena") or die(mysql_error());

        $Conexion->desconectarse();
    }

}

?>
