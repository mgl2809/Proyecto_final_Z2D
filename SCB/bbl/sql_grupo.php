<?php
/**
 *
 * @Clase para validar el acceso al sistema. "sql_grupo.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
require_once('../../dao/conexion.php');
require_once('../../dao/cargadocente.php');
require_once('../../dao/encabezadoa.php');
require_once('../../dao/cargaalumno.php');
require_once('../../dao/grupo.php');

class sql_grupo {

    public function __construct() {
        
    }

    //Determina el Encabezado de la Carga de un Alumno

    public function EncabezadoAlumno($nc) {

        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar(" select alumno.idAlumno, alumno.nombre_completo, 
            alumno.no_control, sum( materia.creditos) as 	
            credito,grupo.semestre,carrera.nombre, carrera.idCarrera  
            from alumno inner join lista_alumnos on lista_alumnos.Alumno_idAlumno= alumno.idAlumno 
            inner join carga on carga.idcarga = lista_alumnos.carga_idCarga 
            inner join materia on carga.Materia_idMateria = materia.idMateria 
            inner join grupo on carga.Grupo_idGrupo = grupo.idGrupo 
            inner join carrera on grupo.Carrera_idCarrera = carrera.idCarrera 
            where no_control = '" . $nc . "' group by alumno.no_control;");



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

        $Conexion->desconectarse();
        return $carga;
    }

//Buscar la Carga Actual de un alumno por nc

    public function BuscarCargaAlumno($nc) {

        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar("select carga.idCarga,materia. nombre as materia, 
            docente.nombre as docente, materia.ret_cvo, materia.clave, grupo.grupo,
            materia.creditos from alumno inner join lista_alumnos on lista_alumnos.Alumno_idAlumno= alumno.idAlumno
            inner join carga on carga.idcarga = lista_alumnos.Carga_idCarga
            inner join materia on carga.Materia_idMateria = materia.idMateria
            inner join docente on carga.Docente_idDocente = docente.idDocente
            inner join grupo on carga.Grupo_idGrupo = grupo.idGrupo
            where no_control = '" . $nc . "'  group by materia.clave order by clave;");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new cargaalumno();
            $objeto->setidcarga($renglon['idCarga']);
            $objeto->setmateria($renglon['materia']);
            $objeto->setdocente($renglon['docente']);
            $objeto->setclave($renglon['ret_cvo']);
            $objeto->setgrupo($renglon['clave'] . " " . $renglon['grupo']);
            $objeto->setcreditos($renglon['creditos']);
            array_push($carga, $objeto);
        }

        $Conexion->desconectarse();
        return $carga;
    }

//Listar Materias disponibles para un alumno

    public function MateriasDiponiblesCarrera($idcarrera, $semestre) {

        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar("SELECT carga.idCarga, materia.nombre as materia, 
            docente.nombre as docente, materia.ret_cvo, 
            concat(materia.clave,' ', grupo.grupo)as grupo, materia.creditos
            FROM grupo inner join carga on carga.Grupo_idGrupo = grupo.idgrupo
            inner join materia on carga.Materia_idMateria = materia.idMateria
            inner join docente on carga.Docente_idDocente = docente.idDocente											
            where grupo.Carrera_idCarrera = '" . $idcarrera . "' and grupo.semestre = '" . $semestre . "'");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new cargaalumno();
            $objeto->setidcarga($renglon['idCarga']);
            $objeto->setmateria($renglon['materia']);
            $objeto->setdocente($renglon['docente']);
            $objeto->setclave($renglon['ret_cvo']);
            $objeto->setgrupo($renglon['grupo']);
            $objeto->setcreditos($renglon['creditos']);
            array_push($carga, $objeto);
        }

        $Conexion->desconectarse();
        return $carga;
    }

//Elimianr a un alumnos de una carga

    public function EliminarCargaAlumno($idCarga, $idAlumno) {



        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("delete from lista_alumnos where Carga_idCarga =" . $idCarga . " 
            and Alumno_idAlumno =" . $idAlumno . ";");


        $Conexion->desconectarse();
    }

//Asignar una carga a un alumno	

    public function AsignarCargaAlumno($idCarga, $idAlumno, $opcion) {



        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("INSERT INTO lista_alumnos (Carga_idCarga,Alumno_idAlumno,Opcion) 
            VALUES (" . $idCarga . "," . $idAlumno . "," . $opcion . ");");


        $Conexion->desconectarse();
    }

//Lista la Carga Actual de un Docente	
    public function ListarCargaDocente($docente) {


        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_docentes = $Conexion->ejecutar("SELECT carga.idCarga,materia.nombre as materia, materia.ret_cvo, grupo.nombre, grupo.semestre, 		  			  			grupo.grupo,carrera.nombre as carrera 
            FROM carga inner join docente on carga.Docente_idDocente = docente.idDocente 
            inner join materia on carga.Materia_idMateria = materia.idMateria 
            inner join grupo on carga.Grupo_idGrupo = grupo.idGrupo
            inner join carrera on grupo.Carrera_idCarrera = carrera.idCarrera 
            where docente.idDocente ='" . $docente . "';");


        while ($renglon = mysql_fetch_array($lista_docentes)) {
            $objeto = new cargadocente();
            $objeto->setidgrupo($renglon['idCarga']);
            $objeto->setmateria($renglon['materia']);
            $objeto->setclave($renglon['nombre']);
            $objeto->setgrupo($renglon['semestre'] . "  " . $renglon['grupo']);
            $objeto->setcarrera($renglon['carrera']);
            array_push($carga, $objeto);
        }

        $Conexion->desconectarse();
        return $carga;
    }

//Lista los Grupos que estan sin un docente	

    public function ListarMateriasPorAsignar() {


        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_carga = $Conexion->ejecutar("select idGrupo, grupo.nombre,
            materia.nombre as materia, carrera.nombre as carrera, grupo.semestre, grupo.grupo 
            from carga inner join grupo on carga.Grupo_idGrupo=grupo.idGrupo 
            inner join materia on grupo.nombre=materia.clave 
            inner join carrera on grupo.Carrera_idCarrera = carrera.idCarrera 
            where not exists(select carga.Grupo_idGrupo from carga where (carga.Grupo_idGrupo = grupo.idGrupo )) 
            or Docente_idDocente = 0 or Docente_idDocente = 1;");


        while ($renglon = mysql_fetch_array($lista_carga)) {
            $objeto = new cargadocente();
            $objeto->setidgrupo($renglon['idGrupo']);
            $objeto->setmateria($renglon['materia']);
            $objeto->setclave($renglon['nombre']);
            $objeto->setgrupo($renglon['semestre'] . "  " . $renglon['grupo']);
            $objeto->setcarrera($renglon['carrera']);
            array_push($carga, $objeto);
        }

        $Conexion->desconectarse();
        return $carga;
    }

//Elimina Un grupo de la carga de un docente	

    public function EliminarCargaDocente($idCarga) {


        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("update carga set Docente_idDocente = 0 where idCarga =" . $idCarga . ";");


        $Conexion->desconectarse();
    }

//Asigana la carga de un docente un grupo	

    public function AsiganrCargaDocente($docente, $grupo) {


        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("update carga set Docente_idDocente = " . $docente . " 
            where Grupo_idGrupo =" . $grupo . ";");


        $Conexion->desconectarse();
    }

    // Listar Grupos por carrera

    public function ListarGrupos($carerra, $semestre) {

        $grupos = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Lista_materias = $Conexion->ejecutar("select materia.nombre as materia, 
            carrera.nombre as carrera, carrera.idCarrera, materia.semestre,materia.clave
            from materia inner join carrera on materia.carrera_dep = carrera.dep
            where carrera_dep='" . $carerra . "' and materia.semestre='" . $semestre . "';");



        while ($renglon = mysql_fetch_array($Lista_materias)) {
            $objeto = new grupo();
            $objeto->setid($renglon['idCarrera']);
            $objeto->setmateria($renglon['materia']);
            $objeto->setcarrera($renglon['carrera']);
            $objeto->setnombre($renglon['clave']);
            $objeto->setsemestre($renglon['semestre']);
            array_push($grupos, $objeto);
        }
        $Conexion->desconectarse();

        return $grupos;
    }

// Buscar grupo

    public function BuscarGrupo($nombre, $grupo, $semestre) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $grupo_admin = $Conexion->ejecutar("select * from grupo where nombre='" . $nombre . "' 
            and grupo = '" . $grupo . "' and semestre = '" . $semestre . "';");



        if ($admin = mysql_fetch_array($grupo_admin)) { //Es un alumno
            $result = 1;
        } else {
            $result = 0;
        }

        $Conexion->desconectarse();

        return $result;
    }

    public function CrearGrupo($materia) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("INSERT INTO lista_alumnos (Carga_idCarga,Alumno_idAlumno,Opcion)
            VALUES (" . $idCarga . "," . $idAlumno . "," . $opcion . ");");


        $Conexion->desconectarse();
    }

}
?>
