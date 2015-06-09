<?php

require('../fpdf/fpdf.php');
require_once('../../bbl/sql_creditos.php');
require_once('../../bbl/sql_alumno.php');

require_once('../../dao/datos1_sc.php');
require_once('../../dao/datos2_sc.php');
require_once('../../dao/alumno.php');

class PDF extends FPDF {

    //Funcion de la Tabal

    function TablaBasica($div, $nombre) {
        //Salto de l�nea
        $this->Ln(20);
        $this->Cell(5);
        $this->Ln(3);
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(15);
        $this->Cell(0, 0, $div, 0, 1, 'C');
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0, 0, '=================================================================================================', 0, 1, 'C');
        $this->Ln(5);
        $this->Cell(80);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(1, 0, $nombre, 0, 1, 'C');
        $this->Ln(15);


        //Cabecera
        //$this->Cell(65,3,"CARRERA: ".$div."");
    }

    // Enzabezado Oficio
    function EncabezadoOficio($fecha, $subdirector) {
        //Salto de l�nea
        $this->Ln(15);
        $this->Cell(120);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(1, 0, "Rio Grande, Zac., a " . $fecha, 0, 1, 'C');
        $this->Ln(15);
        //$this->SetFont('Arial','B',10);
        //Cabecera
        $this->Cell(1);
        $this->Cell(0, 0, "C. " . $subdirector, 0, 1);
        $this->Cell(40);
        $this->Ln(4);
        $this->Cell(0, 0, "SUBDIRECTOR DE SERVICIOS ACAD�MECOS DEL ", 0, 1);
        $this->Cell(40);
        $this->Ln(4);
        $this->Cell(0, 0, "INSTITUTO TECNOL�GICO SUPERIOR ZACATECAS NORTE ", 0, 1);
        $this->Cell(40);
        $this->Ln(4);
        $this->Cell(0, 0, "PRESENTE. ", 0, 1);

        $this->Ln(3);
        $this->Ln(3);
    }

    function Cuerpo($encargado, $div, $actividad, $periodo, $profesor) {
        //Salto de l�nea
        $this->Ln(15);
        $this->Cell(100);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(1, 0, "ATN.:", 0, 1);
        $this->Ln(5);
        $this->SetFont('Arial', 'U', 12);
        $this->Cell(100);
        $this->Cell(1, 0, $encargado, 0, 1);
        $this->Ln(7);
        $this->Cell(100);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(0, 0, "JEFE DE DIVISI�N DE", 0, 1);
        $this->Ln(5);
        $this->SetFont('Arial', 'U', 12);
        $this->Cell(100);
        $this->Cell(250, 0, $div, 0, 1);

        $this->SetFont('Arial', 'I', 12);
        $Cadena = "     Por este medio, solicito me sea autorizado realizar la actividad complementaria: " . $actividad . ", en el periodo escolar " . $periodo . ", asi mismo le informo que el Profesor Responsable de dicha actividad ser�: " . $profesor . ".";
        $this->Ln(13);
        $this->Cell(10);
        $this->MultiCell(0, 5, $Cadena, 0, 'J', false);

        $this->Ln(13);
        $this->Cell(20);
        $this->Cell(0, 0, "En espera de su aprobaci�n, quedo a sus �rdenes.", 0, 1);
    }

    function Atentemente($alumno, $nc, $sem) {
        //Salto de l�nea
        $this->Ln(30);
        $this->Cell(10);

        $this->Cell(1, 0, "Atentamente:", 0, 1);
        $this->Ln(10);
        $this->SetFont('Arial', 'U', 12);
        $this->Cell(10);
        $this->Cell(1, 0, $alumno, 0, 1);
        $this->SetFont('Arial', 'I', 12);
        $this->Ln(5);
        $this->Cell(10);
        $this->Cell(0, 0, "Nombre y firma del solicitante", 0, 1);
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(0, 0, "No. Control: ", 0, 1);
        $this->SetFont('Arial', 'U', 12);
        $this->Cell(35);
        $this->Cell(250, 0, $nc, 0, 1);
        $this->Ln(5);
        $this->Cell(10);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(0, 0, "Semestre y Carrera: ", 0, 1);
        $this->SetFont('Arial', 'U', 12);
        $this->Cell(50);
        $this->Cell(250, 0, $sem, 0, 1);
        $this->Ln(20);
        $this->Cell(10);
        $this->SetFont('Arial', 'I', 9);
        $this->Cell(0, 4, 'c.c.p. Archivo', 0, 1, 'L');
    }

//Cabecera de p�gina
    function Header() {
        //Logo
        $this->Image('tec.png', 10, 8, 33);
        //Arial bold 15
        $this->SetFont('Arial', 'B', 13);
        //Movernos a la derecha
        $this->Cell(30);
        //T�tulo
        $this->Cell(0, 8, 'INSTITUTO TECNOLOGICO SUPERIOR ZACATECAS NORTE', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 8);
    }

//Pie de p�gina
    function Footer() {
        //Posici�n: a 1,5 cm del final
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 4);
        //N�mero de p�gina
        //$this->Cell(1,0,'C.- CONOCIMIENTO P.- PRODUCTO  D.- DESEMPE�O  A.- ACTITUD',0,1);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 3, 'Carr. a Gonz�lez Ortega Km. 3. C.P. 98400, Ap. Postal # 178,', 0, 1, 'C');
        $this->Cell(0, 3, 'R�o Grande, Zac., Tels.:(498)98 2 04 56, Fax (498) 98 3 99 79, email: itszndirecciongeneral@gmail.com,', 0, 1, 'C');
        $this->SetFont('Arial', 'U', 8);
        $this->Cell(0, 3, 'www.itszn.edu.mx', 0, 1, 'C');
        //$this->Cell(0,3,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();




/* 	
  $id_usuario=$_COOKIE['idusuario'];
  $usuarios=$Conexion->ejecutar("SELECT cve, nombre FROM administrador where usuario_idusuario=".$id_usuario.";");

  $usuario=mysql_fetch_array($usuarios);

  $tipo = $usuario['cve'];
 */
$id = $_GET["id"];

$msql_creditos = new sql_creditos;
$msql_alumno = new sql_alumno;

$datos = $msql_creditos->DatosOf1($id);
$datos2 = $msql_creditos->DatosOf2($id);
$ida = $msql_creditos->RegresaIdAlumno($id);
$datos3 = $msql_alumno->RegresaAlumno($ida, $datos2->getidperiodo());


$pdf->TablaBasica("ANEXO 1", "SOLICITUD DE AUTORIZACI�N DE ACTIVIDAD COMPLEMENTARIA");


$pdf->EncabezadoOficio($datos->getfecha(), "ING. EDUARDO SALAS CALDER�N");

$pdf->Cuerpo($datos->getnombre(), $datos->getdivision(), $datos2->getactividad(), $datos2->getperiodo(), $datos2->getdocente());

$pdf->Atentemente($datos3->getnombre(), $datos3->getnc(), $datos3->getsem() . "� de " . $datos->getdivision());

//	$pdf->NewRow($i,$grupo['carrera'],$grupo['semestre']."  ".$grupo['grupo'],number_format($porcentaje)); 
//$pdf->NewRow($i,$grupo['carrera'],$grupo['semestre']."  ".$grupo['grupo'],0); 





$pdf->Output();
?>

