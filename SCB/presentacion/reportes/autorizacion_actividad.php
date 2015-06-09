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
    function EncabezadoOficio($fecha, $nombre, $nc, $carrera) {
        //Salto de l�nea
        $this->Ln(6);
        $this->Cell(120);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(1, 0, "Rio Grande, Zac., a " . $fecha, 0, 1, 'C');
        $this->Ln(5);
        $this->Cell(76);
        $this->Cell(0, 0, "Asunto:", 0, 1, 'L');
        $this->SetFont('Arial', 'U', 12);
        $this->Cell(92);
        $this->Cell(0, 0, "Notificaci�n", 0, 1, 'L');
        $this->SetFont('Arial', 'I', 12);
        $this->Ln(15);
        //$this->SetFont('Arial','B',10);
        //Cabecera
        $this->Cell(1);
        $this->Cell(0, 0, "C. ", 0, 1);
        $this->SetFont('Arial', 'U', 12);
        $this->Cell(7);
        $this->Cell(0, 0, $nombre . ",", 0, 1);
        $this->Cell(40);
        $this->Ln(5);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(0, 0, "No. DE CONTROL: ", 0, 1);
        $this->SetFont('Arial', 'U', 12);
        $this->Cell(38);
        $this->Cell(0, 0, $nc, 0, 1);
        $this->Cell(40);
        $this->Ln(5);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(0, 0, "CARRERA: ", 0, 1);
        $this->SetFont('Arial', 'U', 12);
        $this->Cell(23);
        $this->Cell(0, 0, $carrera, 0, 1);
        $this->Cell(40);
        $this->Ln(5);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(0, 0, "PRESENTE. ", 0, 1);

        $this->Ln(3);
    }

    function Cuerpo($encargado, $div, $actividad, $periodo, $profesor, $valor) {
        //Salto de l�nea
        $this->Ln(12);


        $this->SetFont('Arial', 'I', 12);
        $Cadena = "     Por este medio, hago de su conocimiento que SE LE AUTORIZA realizar la actividad complementaria:";
        $Cadena = $Cadena . " " . $actividad . ", con asesor�a del Profesor: " . $profesor;
        $Cadena = $Cadena . ", durante el periodo escolar: " . $periodo;
        $Cadena = $Cadena . ", con un valor curricular de: " . $valor . " Cr�dito(s).";
        $this->Ln(13);
        $this->Cell(10);
        $this->MultiCell(0, 5, $Cadena, 0, 'J', false);

        $this->Ln(13);
        $this->Cell(10);
        $Cadena = "     En espera del cumplimiento puntual de la actividad autorizada, y sin otro particular ";
        $Cadena = $Cadena . "por el momento, quedo a sus �rdenes.";
        $this->MultiCell(0, 5, $Cadena, 0, 'J', false);
    }

    function Atentemente($eslogan, $subdirector, $jefediv, $division) {
        //Salto de l�nea
        $this->Ln(20);
        $this->Cell(10);

        $this->Cell(1, 0, "Atentamente:", 0, 1);
        $this->Ln(5);
        $this->Cell(10);
        $this->Cell(1, 0, $eslogan, 0, 1);
        $this->SetFont('Arial', 'I', 12);
        $this->Ln(15);
        $this->Cell(10);
        $this->Cell(0, 0, $subdirector, 0, 1);
        $this->Ln(5);
        $this->Cell(10);
        $this->Cell(0, 0, "Subdirector de Servicios Acad�micos. ", 0, 1);
        $this->SetFont('Arial', 'I', 9);
        $this->Ln(20);
        $this->Cell(10);
        $this->Cell(250, 0, "c.c.p", 0, 1);
        $this->Cell(18);
        $this->SetFont('Arial', 'I', 10);
        $Cadena = $jefediv . " JEFE DE DIVISI�N DE " . $division . ".- Edificio.- Para su conocimiento y efectos. ";
        $this->MultiCell(0, 5, $Cadena, 0, 'J', false);
        $this->Ln(3);
        $this->Cell(18);
        $this->Cell(0, 0, "Archivo.", 0, 1);
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

$datos = $msql_creditos->DatosOfAutorizacion1($id);
$datos2 = $msql_creditos->DatosOf2($id);
$ida = $msql_creditos->RegresaIdAlumno($id);
$datos3 = $msql_alumno->RegresaAlumno($ida, $datos2->getidperiodo());


$pdf->TablaBasica("ANEXO 2", "AUTORIZACI�N DE ACTIVIDAD COMPLEMENTARIA");


$pdf->EncabezadoOficio($datos->getfecha(), $datos3->getnombre(), $datos3->getnc(), $datos->getdivision());

$pdf->Cuerpo($datos->getnombre(), $datos->getdivision(), $datos2->getactividad(), $datos2->getperiodo(), $datos2->getdocente(), $datos2->getvalor());

$pdf->Atentemente("\"Nuestra Meta, la Excelencia\"", "ING. EDUARDO SALAS CALDER�N", $datos->getnombre(), $datos->getdivision());

//	$pdf->NewRow($i,$grupo['carrera'],$grupo['semestre']."  ".$grupo['grupo'],number_format($porcentaje)); 
//$pdf->NewRow($i,$grupo['carrera'],$grupo['semestre']."  ".$grupo['grupo'],0); 





$pdf->Output();
?>

