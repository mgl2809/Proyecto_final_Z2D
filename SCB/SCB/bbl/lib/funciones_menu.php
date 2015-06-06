<?php
function Menu_docente()
{
$menu[1]['link']="../acceso_sistema/menu_docentes.php";
$menu[1]['texto']="Opciones";
$menu[2]['link']="../calificaciones/lista_materias.php";
$menu[2]['texto']="Capturar calificaciones";
$menu[3]['link']="../reportes/ver_calificaciones_materia.php";
$menu[3]['texto']="Reportes";

$menu[4]['link']="../calificacionesR/lista_materias.php";
$menu[4]['texto']="Consultar en PDF's";

$menu[5]['link']="../acceso_sistema/ver_parciales.php";
$menu[5]['texto']="Calendario de parciales";
$menu[6]['link']="../usuarios/modificar_cuenta.php";
$menu[6]['texto']="Cuenta";
$menu[7]['link']="../acceso_sistema/logout.php";
$menu[7]['texto']="Salir";

if(!$_COOKIE['parcial_actual']) //Desactivar la captura si no hay parcial activo
{
   $menu[2]['link']='#';
   $menu[2]['texto']='';
}

return $menu;
}

function Menu_administrador()
{
/*$menu[1]['link']="../configuracion/configurar_parciales.php";
$menu[1]['texto']="Configurar parciales";
$menu[2]['texto']="Modificar Usuarios";
$menu[2]['link']="../cuentas/FRM_BuscaAlumno.php";*/
$menu[1]['texto']= "Carga";
$menu[1]['link']= "../../precentacion/carga/listar_carga.php";

$menu[2]['texto']= "Alumnos";
$menu[2]['link']= "../../presentacion/creditos/listar_alumnos.php";


$menu[3]['link']="../usuarios/modificar_cuenta.php";
$menu[3]['texto']="Cuenta";

$menu[4]['link']="../../precentacion/reportes/FRM_BuscaCarrera.php";
$menu[4]['texto']="Boletas";

$menu[5]['link']="../../presentacion/materias/listar_materias.php";
$menu[5]['texto']="Materias";                                       

$menu[6]['link']="../../presentacion/docentes/listar_docentes.php";
$menu[6]['texto']="Docentes";

$menu[7]['link']="../acceso/logout.php";
$menu[7]['texto']="Salir";

$menu[1]['estatus']=" class='current' ";
return $menu;
}

function Menu_captura()
{
$menu=Menu_docente();
$menu[2]['estatus']=" class='current' ";
return $menu;
}

function Menu_pdf()
{
$menu=Menu_docente();
$menu[4]['estatus']=" class='current' ";
return $menu;
}



function Menu_captura_continua()
{
$menu=Menu_docente();
$menu[2]['estatus']=" class='current' ";
$menu[3]['link']="../calificaciones/seleccion_unidad.php";
$menu[3]['texto']="Calificar otra unidad";
$menu[4]['link']="../reportes/ver_calificaciones_materia.php";
$menu[4]['texto']="Reportes";
return $menu;
}
function Menu_ver_parciales()
{
$menu=Menu_docente();
$menu[5]['estatus']=" class='current' ";
return $menu;
}
function Menu_opciones_docente()
{
$menu=Menu_docente();
$menu[1]['estatus']=" class='current' ";
return $menu;
}

function Menu_usuario_docente()
{
$menu=Menu_docente();
$menu[6]['estatus']=" class='current' ";
return $menu;
}


function Menu_diviciones()
{
$menu[1]['texto']="Reportes";
$menu[1]['link']="../reportesA/ver_calificaciones_materia.php";
$menu[2]['texto']="Reportes No Aprobados";
$menu[2]['link']="../reportesA/ver_calificaciones_materiaNA.php";
$menu[3]['texto']="Reportes por Alumno";
$menu[3]['link']="../reportesA/FRM_BuscaAlumno.php";
$menu[4]['texto']="Alumno No Aprobados";
$menu[4]['link']="../reportesA/FRM_BuscaAlumnoNP.php";

$menu[5]['link']="../calificacionesR/ver_calificaciones_materia.php";
$menu[5]['texto']="Consultar en PDF's";

$menu[6]['link']="../Reportes_NC/ver_materia.php";
$menu[6]['texto']="Consultar no Reportadas";

$menu[7]['link']="../reportesPDF/procetajecapturado_pdf.php";
$menu[7]['texto']="Consultar % Capturado";

$menu[8]['link']="../usuarios/modificar_cuenta.php";
$menu[8]['texto']="Cuenta";
$menu[9]['link']="../acceso_sistema/logout.php";
$menu[9]['texto']="Salir";
return $menu;
}

function Menu_admin()
{
$menu[1]['texto']="Reportes por Carrera";
$menu[1]['link']="../reportesA/FRM_BuscaCarrera.php";
$menu[2]['texto']="Reportes por Alumno";
$menu[2]['link']="../reportesA/FRM_BuscaAlumnoA.php";

$menu[3]['texto']="Modificar Usuarios";
$menu[3]['link']="../cuentas/FRM_BuscaAlumnoE.php";

$menu[4]['link']="../calificacionesR/FRM_BuscaCarreraPDF.php";
$menu[4]['texto']="Consultar en PDF's";


$menu[5]['link']="../usuarios/modificar_cuenta.php";
$menu[5]['texto']="Cuenta";
$menu[6]['link']="../acceso_sistema/logout.php";
$menu[6]['texto']="Salir";
return $menu;
}



function Menu_alumno()
{
$menu[1]['texto']="Reportes";
$menu[1]['link']="../reportes/ver_calificaciones_alumnos.php";
$menu[2]['link']="../usuarios/modificar_cuenta.php";
$menu[2]['texto']="Cuenta";
$menu[3]['link']="../acceso_sistema/logout.php";
$menu[3]['texto']="Salir";
return $menu;
}

function Menu_usuario_alumno()
{
$menu=Menu_alumno();
$menu[2]['estatus']=" class='current' ";
return $menu;
}
?>

