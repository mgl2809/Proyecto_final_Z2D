<?php

/**
 *
 * @Clase para validar el acceso al sistema. "sql_acceso.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
require_once('../../dao/conexion.php');
require_once('../../dao/alumno.php');

class sql_alumno {

    public function __construct() {
        
    }

    //registrar un nuevo alumno
    public function SaveAlumno($objeto) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("INSERT INTO alumno (usuario_idusuario, no_control, nombre_completo) VALUES (" . $objeto->getidusuario() . ",'" . $objeto->getnc() . "','" . $objeto->getnombre() . "');");

        $Conexion->desconectarse();
    }

    //registrar la informacion correspondiente del alumno
    public function SaveInfoAlumno($objeto1) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("INSERT INTO info_alumno (no_control, especialidad, estatus, curp, sexo, fecha_nacimiento, direccion, telefono, correo, ns_social, tutor, edo_civil, periodo, anio)
        VALUES('" . $objeto1->getnc() . "'," . $objeto1->getespecialidad() . "," . $objeto1->getestatus(). ",'" . $objeto1->getcurp() . "','" . $objeto1->getsexo() . "',
        '" . $objeto1->getfechanacimiento() . "','" . $objeto1->getdireccion() . "','" . $objeto1->gettelefono() . "','" . $objeto1->getcorreo() . "','" . $objeto1->getnssocial() . "','" . $objeto1->gettutor() . "',
        '".$objeto1->getedocivil()."',".$objeto1->getperiodo().",'".$objeto1->getanio()."');");

        $Conexion->desconectarse();
    }
        
   //seleccionar el alumno
    public function SelectAlumno($nc) {

        $alumnos = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_alumnos = $Conexion->ejecutar("SELECT alumno.idAlumno, alumno.usuario_idusuario AS idusuario, 
        alumno.no_control, alumno.nombre_completo AS nombre, info_alumno.id_info, info_alumno.especialidad, 
        info_alumno.estatus, info_alumno.curp, info_alumno.sexo, info_alumno.fecha_nacimiento AS fecha, 
        info_alumno.direccion, info_alumno.telefono, info_alumno.correo, info_alumno.ns_social, info_alumno.tutor,
        info_alumno.edo_civil, info_alumno.periodo, info_alumno.anio
        FROM alumno INNER JOIN info_alumno ON alumno.no_control = info_alumno.no_control
        WHERE alumno.no_control = '" . $nc . "' AND info_alumno.no_control = '" . $nc . "';");

        while ($renglon = mysql_fetch_array($lista_alumnos)) {
            $objeto = new alumno();
            $objeto->setid($renglon['idAlumno']);
            $objeto->setidusuario($renglon['idusuario']);
            $objeto->setnc($renglon['no_control']);
            $objeto->setnombre($renglon['nombre']);
            $objeto->setidinfo($renglon['id_info']);
            $objeto->setespecialidad($renglon['especialidad']);
            $est = $renglon['estatus'];
            switch ($est) {
                case '1':
                    $estatus = "ACTIVO";
                    break;
                case '0':
                    $estatus = "INACTIVO";
                    break;
                default;
            }
            $objeto->setestatus($estatus);
            $objeto->setcurp($renglon['curp']);
            $objeto->setsexo($renglon['sexo']);
            $objeto->setfechanacimiento($renglon['fecha']);
            $objeto->setdireccion($renglon['direccion']);
            $objeto->settelefono($renglon['telefono']);
            $objeto->setcorreo($renglon['correo']);
            $objeto->setnssocial($renglon['ns_social']);
            $objeto->settutor($renglon['tutor']);
            $objeto->setedocivil($renglon['edo_civil']);
            $idperiodo = $renglon['periodo'];
                switch($idperiodo){
                    case '1':
                        $nomperiodo = "AGO-ENE";
                    break;
                    case '2':
                        $nomperiodo = "FEB-JUL";
                    break;
                    case '3':
                        $nomperiodo = "VERANO";
                    break;
                    case '4':
                        $nomperiodo = "INVIERNO";
                    break;
                    default;
                }
            $objeto->setperiodo($nomperiodo);
            $objeto->setanio($renglon['anio']);

            array_push($alumnos, $objeto);
        }

        $Conexion->desconectarse();
        return $alumnos;
    }

    //Actualizar un alumno
    public function UpdateAlumno($objeto) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("UPDATE alumno set usuario_idusuario = " . $objeto->getidusuario() . ", no_control ='" . $objeto->getnc() . "', nombre_completo ='" . $objeto->getnombre() . "'
        WHERE idAlumno = " . $objeto->getid() . ";");

        $Conexion->desconectarse();
    }

    //Actualizar la información que corresponde a un alumno
    public function UpdateInfoAlumno($objeto1) {

        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $Conexion->ejecutar("UPDATE info_alumno set no_control = '" . $objeto1->getnc() . "',especialidad =" . $objeto1->getespecialidad() . ", estatus = ".$objeto1->getestatus().", curp ='" . $objeto1->getcurp() . "', sexo ='" . $objeto1->getsexo() . "',
        fecha_nacimiento ='" . $objeto1->getfechanacimiento() . "', direccion ='" . $objeto1->getdireccion() . "',telefono ='" . $objeto1->gettelefono() . "',correo ='" . $objeto1->getcorreo() . "',ns_social ='" . $objeto1->getnssocial() . "',
        tutor ='" . $objeto1->gettutor() . "',edo_civil = '".$objeto1->getedocivil()."' 
        WHERE id_info = " . $objeto1->getidinfo() . ";");
        
        $Conexion->desconectarse();
    }

//Listar alumnos por datos
    public function ListarAlumnosBuscados($dato) {


        $alumnos = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_alumnos = $Conexion->ejecutar("SELECT alumno.idAlumno, alumno.no_control, alumno.nombre_completo, info_alumno.estatus FROM alumno
         INNER JOIN info_alumno ON alumno.no_control = info_alumno.no_control where alumno.nombre_completo like  '" . $dato . "%';");


        while ($renglon = mysql_fetch_array($lista_alumnos)) {
            $objeto = new alumno();
            $objeto->setid($renglon['idAlumno']);
            $objeto->setnc($renglon['no_control']);
            $objeto->setnombre($renglon['nombre_completo']);
            switch($est){
                case '1':
                    $estatus = "ACTIVO";
                break;
                case '0':
                    $estatus = "INACTIVO";
                break;
                default;
            }
            $objeto->setestatus($estatus);

            array_push($alumnos, $objeto);
        }

        $Conexion->desconectarse();
        return $alumnos;
    }

    //Listar Alumnos por no

    public function ListarAlumnosNC($dato) {


        $alumnos = array();
        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_alumnos = $Conexion->ejecutar("SELECT alumno.idAlumno, alumno.no_control, alumno.nombre_completo, info_alumno.estatus FROM alumno
         INNER JOIN info_alumno ON alumno.no_control = info_alumno.no_control where alumno.no_control = '" . $dato . "' AND info_alumno.no_control = '".$dato."';");


        while ($renglon = mysql_fetch_array($lista_alumnos)) {
            $objeto = new alumno();
            $objeto->setid($renglon['idAlumno']);
            $objeto->setnc($renglon['no_control']);
            $objeto->setnombre($renglon['nombre_completo']);
            $est = $renglon['estatus'];
            switch($est){
                case '1':
                    $estatus = "ACTIVO";
                break;
                case '0':
                    $estatus = "INACTIVO";
                break;
                default;
            }
            $objeto->setestatus($estatus);

            array_push($alumnos, $objeto);
        }

        $Conexion->desconectarse();
        return $alumnos;
    }

    // Listar Datos del Alumno. nc, nombre y semestre

    public function RegresaAlumno($dato, $periodo) {



        $Conexion = conectar_bd();
        $Conexion->conectarse();

        $lista_alumnos = $Conexion->ejecutar("SELECT idAlumno, no_control, nombre_completo FROM alumno where idAlumno = '" . $dato . "';");


        while ($renglon = mysql_fetch_array($lista_alumnos)) {
            $objeto = new alumno();

            $anyo = substr($renglon['no_control'], 0, 2);
            $year_now = date("Y");
            $year_now = substr($year_now, -2);
            $sem = $year_now - $anyo;
            $sem = $sem * 2;
            if ($periodo == 1) {
                $sem = $sem + 1;
            }

            $objeto->setnc($renglon['no_control']);
            $objeto->setnombre($renglon['nombre_completo']);
            $objeto->setsem($sem);
        }

        $Conexion->desconectarse();
        return $objeto;
    }

}

?>
