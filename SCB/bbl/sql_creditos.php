<?php

/**
 *
 * @Clase para validar el acceso al sistema. "sql_acceso.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
require_once('../../dao/conexion.php');
require_once('../../dao/cargadocente.php');
require_once('../../dao/encabezadoa.php');
require_once('../../dao/cargaalumno.php');
require_once('../../dao/credito.php');
require_once('../../dao/credito_sol.php');
require_once('../../dao/datos1_sc.php');
require_once('../../dao/datos2_sc.php');

require_once('sql_fechas.php');

class sql_creditos {

    public function __construct() {
        
    }

    //Determina el Encabezado de la Carga de un Alumno

    public function EncabezadoAlumno($nc) {

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
            where no_control = '" . $nc . "' group by alumno.no_control;");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new encabezadoa();
            $objeto->setid($renglon['idAlumno']);
            $objeto->setnombre($renglon['nombre_completo']);
            $objeto->setnc($renglon['no_control']);
            $objeto->setcreditos($renglon['credito']);
            $objeto->setsemestre($renglon['semestre']);
            $objeto->setespecialidad($renglon['nombre']);
            $objeto->setcarrera($renglon['idCarrera']);

            array_push($carga, $objeto);
        }

        $Conexion->desconectarse();
        return $carga;
    }

//Buscar la Carga Actual de un alumno por nc

    public function BuscarCreditosAlumno($id) {

        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Creditos = $Conexion->ejecutar("SELECT id_solicitud, 
            creditos.nombre as credito, creditos.creditos, docente.nombre, solicitud_credito.fecha_solicitud,
            solicitud_credito.fecha_autorizacion,fecha_liberacion, estado,
            periodo.nombre as periodo FROM solicitud_credito
            inner join alumno on alumno.idAlumno = solicitud_credito.id_alumno
            inner join periodo on periodo.idPeriodo = solicitud_credito.periodo_id_periodo
            inner join creditos on creditos.id_credito = solicitud_credito.actividad_id_actividad
            inner join docente on docente.idDocente = solicitud_credito.docente_id_docente
            where alumno.no_control = '" . $id . "';");



        while ($renglon = mysql_fetch_array($Creditos)) {
            $objeto = new credito_sol();
            $objeto->setid($renglon['id_solicitud']);
            $objeto->setcredito($renglon['credito']);
            $objeto->setdocente($renglon['nombre']);
            $objeto->setfechas($renglon['fecha_solicitud']);
            $objeto->setedo($renglon['estado']);
            $objeto->setperiodo($renglon['periodo']);


            array_push($carga, $objeto);
        }

        $Conexion->desconectarse();
        return $carga;
    }

//Buscar Solicitud

    public function BuscarSolicitudAct($id) {


        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Creditos = $Conexion->ejecutar("SELECT id_solicitud, 
            creditos.nombre as credito, creditos.creditos, docente.nombre, estado,descripcion,id_carrera FROM solicitud_credito
            inner join creditos on creditos.id_credito = solicitud_credito.actividad_id_actividad
            inner join docente on docente.idDocente = solicitud_credito.docente_id_docente
            where id_solicitud ='" . $id . "';");



        while ($renglon = mysql_fetch_array($Creditos)) {
            $objeto = new credito_sol();
            $objeto->setid($renglon['id_solicitud']);
            $objeto->setcredito($renglon['credito']);
            $objeto->setvalor($renglon['creditos']);
            $objeto->setdocente($renglon['nombre']);
            $objeto->setedo($renglon['estado']);
            $objeto->setdescripcion($renglon['descripcion']);
            $objeto->setcarrera($renglon['id_carrera']);
        }

        $Conexion->desconectarse();
        return $objeto;
    }

//Buscar Actividades por carrera

    public function BuscarActividadesCarrera($id) {

        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Creditos = $Conexion->ejecutar("SELECT id_solicitud, 
            alumno.nombre_completo as alumno,creditos.nombre as credito, 
            docente.nombre as docente, estado,periodo.idPeriodo,
            periodo.inicio,periodo.fin, anio FROM solicitud_credito
            inner join alumno on alumno.idAlumno = solicitud_credito.id_alumno
            inner join periodo on periodo.idPeriodo = solicitud_credito.periodo_id_periodo
            inner join creditos on creditos.id_credito = solicitud_credito.actividad_id_actividad
            inner join docente on docente.idDocente = solicitud_credito.docente_id_docente
            where solicitud_credito.id_carrera = '" . $id . "';");



        while ($renglon = mysql_fetch_array($Creditos)) {
            $objeto = new credito_sol();
            $objeto->setid($renglon['id_solicitud']);
            $objeto->setalumno($renglon['alumno']);
            $objeto->setcredito($renglon['credito']);
            $objeto->setdocente($renglon['docente']);
            $objeto->setedo($renglon['estado']);
            $periodo = $renglon['idPeriodo'];
            $anio = $renglon['anio'];
            if ($periodo == 1) {
                $anio++;
                $cadena = $renglon['inicio'] . " " . $renglon['anio'] . "-" . $renglon['fin'] . " " . $anio;
            } else {
                $cadena = $renglon['inicio'] . " " . $anio . "-" . $renglon['fin'] . " " . $anio;
            }
            $objeto->setperiodo($cadena);


            array_push($carga, $objeto);
        }

        $Conexion->desconectarse();
        return $carga;
    }

//Listar Materias disponibles para un alumno

    public function CreditosDisponibles($id) {

        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar("select id_credito,nombre,creditos from creditos;");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new credito();
            $objeto->setid($renglon['id_credito']);
            $objeto->setnombre($renglon['nombre']);
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

        $Conexion->ejecutar("delete from lista_alumnos where Carga_idCarga =" 
                . $idCarga . " and Alumno_idAlumno =" . $idAlumno . ";");


        $Conexion->desconectarse();
    }

//Solicitar Credito	

    public function SolicitarCreditoAlumno($mCredito) {



        $Conexion = conectar_bd();
        $Conexion->conectarse();
        $Cadena = "INSERT INTO solicitud_credito(id_alumno,actividad_id_actividad, periodo_id_periodo, docente_id_docente, fecha_solicitud, fecha_autorizacion, fecha_liberacion, estado, descripcion, id_carrera, anio) ";
        $Cadena = $Cadena . "VALUES (" . $mCredito->getalumno() . "," . $mCredito->getcredito() . "," . $mCredito->getperiodo() . "," . $mCredito->getdocente() . ",";
        $Cadena = $Cadena . " '" . $mCredito->getfechas() . "',0000-00-00,0000-00-00,1,'" . $mCredito->getdescripcion() . "'," . $mCredito->getcarrera() . "," . $mCredito->getanio() . ");";

        $Conexion->ejecutar($Cadena);


        $Conexion->desconectarse();
    }

//Asignar una carga a un alumno	

    public function AsignarCreditoAlumno($idAlumno, $idCredito) {



        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("INSERT INTO creditos_acumulados(alumno_id_alumno,credito_id_credito) 
            VALUES (" . $idAlumno . "," . $idCredito . ");");


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

        $lista_carga = $Conexion->ejecutar("select idGrupo, 
            grupo.nombre,materia.nombre as materia, 
            carrera.nombre as carrera, grupo.semestre, grupo.grupo 
            from carga inner join grupo on carga.Grupo_idGrupo=grupo.idGrupo 
            inner join materia on grupo.nombre=materia.clave 
            inner join carrera on grupo.Carrera_idCarrera = carrera.idCarrera 
            where not exists(select carga.Grupo_idGrupo from carga where (carga.Grupo_idGrupo = grupo.idGrupo )) 
            or Docente_idDocente = 0 or Docente_idDocente = 1 or Docente_idDocente = 46;");


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

//Elimina Actividad Solicitada	

    public function EliminarActividadSolicitada($idSol) {


        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("delete from solicitud_credito where id_solicitud=" . $idSol . ";");


        $Conexion->desconectarse();
    }

//Autorizar Actividad, al alumno	

    public function AutorizarActividad($fecha, $id) {


        $carga = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("update solicitud_credito set estado = 2, fecha_autorizacion = 
            '" . $fecha . "' where id_solicitud  =" . $id . ";");


        $Conexion->desconectarse();
    }

//Datos del Ofico de Solicitud
//Fecha, Division y Jefe


    public function DatosOf1($id) {

        $mFechas = new sql_fecha;
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar("select fecha_solicitud, carrera.nombre, carrera.resp
            from solicitud_credito
            inner join carrera on carrera.idCarrera = solicitud_credito.id_carrera
            where id_solicitud = " . $id . ";");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new datosC1;
            //$objeto->setid($renglon['id_credito']); 
            $fecha = $renglon['fecha_solicitud'];

            list($anyo, $mes, $dia) = explode("-", $fecha);
            $objeto->setfecha($mFechas->fecha_actual($dia, $mes, $anyo));
            $objeto->setdivision($renglon['nombre']);
            $objeto->setnombre($renglon['resp']);
        }

        $Conexion->desconectarse();
        return $objeto;
    }

    //Datos de la Actividad, Docente y Periodo.   
    public function DatosOf2($id) {


        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar("select creditos.nombre as actividad, 
            docente.nombre, periodo.inicio, periodo.fin, anio, idPeriodo,creditos.creditos as valor 
            from solicitud_credito
            inner join creditos on creditos.id_credito = solicitud_credito.actividad_id_actividad
            inner join docente on docente.idDocente = solicitud_credito.docente_id_docente
            inner join periodo on periodo.idPeriodo = solicitud_credito.periodo_id_periodo
            where id_solicitud = " . $id . ";");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new datosC2;
            //$objeto->setid($renglon['id_credito']); 
            $periodo = $renglon['idPeriodo'];
            $anyo = $renglon['anio'];
            $Cadena;
            if ($periodo == 1) {
                $anyo2 = $anyo + 1;
                $Cadena = $renglon['inicio'] . " " . $anyo . " - " . $renglon['fin'] . " " . $anyo2;
            } else {
                $Cadena = $renglon['inicio'] . " " . $anyo . " - " . $renglon['fin'] . " " . $anyo;
            }


            $objeto->setperiodo($Cadena);
            $objeto->setactividad($renglon['actividad']);
            $objeto->setdocente($renglon['nombre']);
            $objeto->setidperiodo($renglon['idPeriodo']);
            $objeto->setvalor($renglon['valor']);
        }

        $Conexion->desconectarse();
        return $objeto;
    }

    //Regresa id Alumno

    public function RegresaIdAlumno($id) {

        $mFechas = new sql_fecha;
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar("select id_alumno from solicitud_credito where id_solicitud =  " . $id . ";");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = $renglon['id_alumno'];
        }

        $Conexion->desconectarse();
        return $objeto;
    }

    //Datos del Oficio de Autorizacion

    public function DatosOfAutorizacion1($id) {

        $mFechas = new sql_fecha;
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Encabezado = $Conexion->ejecutar("select fecha_autorizacion, 
            carrera.nombre, carrera.resp
            from solicitud_credito
            inner join carrera on carrera.idCarrera = solicitud_credito.id_carrera
            where id_solicitud = " . $id . ";");



        while ($renglon = mysql_fetch_array($Encabezado)) {
            $objeto = new datosC1;
            //$objeto->setid($renglon['id_credito']); 
            $fecha = $renglon['fecha_autorizacion'];

            list($anyo, $mes, $dia) = explode("-", $fecha);
            $objeto->setfecha($mFechas->fecha_actual($dia, $mes, $anyo));
            $objeto->setdivision($renglon['nombre']);
            $objeto->setnombre($renglon['resp']);
        }

        $Conexion->desconectarse();
        return $objeto;
    }

}

?>
