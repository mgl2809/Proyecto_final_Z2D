<?php

/**
 *
 * @Clase para validar el acceso al sistema. "sql_acceso.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
require_once('../../dao/conexion.php');
require_once('../../dao/detalleboleta.php');
require_once('../../dao/lisatboleta.php');
require_once('../../dao/periodo.php');

class sql_reporte {

    public function __construct() {
        
    }

    //Determina el Encabezado de la Carga de un Alumno

    public function EncabezadoAlumno($idCarrera) {

        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar(" select alumno.idAlumno, 
            alumno.nombre_completo, alumno.no_control, sum( materia.creditos) as
            credito,grupo.semestre,carrera.nombre, carrera.idCarrera
            from alumno inner join lista_alumnos on lista_alumnos.Alumno_idAlumno= alumno.idAlumno
            inner join carga on carga.idcarga = lista_alumnos.carga_idCarga
            inner join materia on carga.Materia_idMateria = materia.idMateria
            inner join grupo on carga.Grupo_idGrupo = grupo.idGrupo
            inner join carrera on grupo.Carrera_idCarrera = carrera.idCarrera 
            where idCarrera = " . $idCarrera . " group by 
            alumno.no_control order by no_control,semestre,nombre_completo");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new encabezadoa();
            $objeto->setid($renglon['idAlumno']);
            $objeto->setnombre($renglon['nombre_completo']);
            $objeto->setnc($renglon['no_control']);
            $objeto->setcreditos($renglon['credito']);
            $objeto->setsemestre($renglon['semestre']);
            $objeto->setespecialidad($renglon['nombre']);

            array_push($carga, $objeto);
        }
        return $carga;
    }

    public function MateriasBoletaAlumno($nc) {

        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar(" SELECT concat(final.clave,final.grupo) as gpo,
            ret_cvo, nombre, creditos,
            promedio, oportunidad
            FROM final inner join materia on materia.clave= final.clave
            where no_control='" . $nc . "';");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new detalleboleta();
            $objeto->setgrupo($renglon['gpo']);
            $objeto->setclave($renglon['ret_cvo']);
            $objeto->setnombre($renglon['nombre']);
            $objeto->setcreditos($renglon['creditos']);
            $objeto->setcalifiacion($renglon['promedio']);
            $objeto->setoportunidad($renglon['oportunidad']);

            array_push($carga, $objeto);
        }

        $Conexion->desconectarse();
        return $carga;
    }

    public function MateriasBoleta($carrera) {

        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar(" SELECT no_control,concat(final.clave,final.grupo) 
            as gpo,ret_cvo, nombre, creditos,
            promedio, oportunidad
            FROM final inner join materia on materia.clave= final.clave;");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new detalleboleta();
            $objeto->setnc($renglon['no_control']);
            $objeto->setgrupo($renglon['gpo']);
            $objeto->setclave($renglon['ret_cvo']);
            $objeto->setnombre($renglon['nombre']);
            $objeto->setcreditos($renglon['creditos']);
            $objeto->setcalifiacion($renglon['promedio']);
            $objeto->setoportunidad($renglon['oportunidad']);

            array_push($carga, $objeto);
        }

        $Conexion->desconectarse();
        return $carga;
    }

    function fecha_Actual() {
        $year_now = date("Y");
        $month_now = date("m");
        $day_now = date("d");

        $fecha = $year_now . "-" . $month_now . "-" . $day_now;

        return $fecha;
    }

    function regresaAnno() {
        return $year_now = date("Y");
    }

    public function PeriodoActual() {

        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar(" SELECT idPeriodo,nombre FROM periodo where actual =1;");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new periodo();
            $objeto->setid($renglon['idPeriodo']);
            $objeto->setnombre($renglon['nombre']);
        }

        $Conexion->desconectarse();
        return $objeto;
    }

}

?>
