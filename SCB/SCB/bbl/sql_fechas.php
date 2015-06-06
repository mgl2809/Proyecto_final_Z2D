<?php

/**
 *
 * @Clase para obtener fechas actuales y mysql. "sql_fecha.php"
 * @versión: 0.1      @modificado:   06 de Diciembre del 2013
 * @autor: JMST
 *
 */
class sql_fecha {

    public function __construct() {
        
    }

//----- Fecha Actual    
    function fecha_actual($dia, $mes, $anio) {
        $week_days = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
        $months = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $year_now = $anio;
        $month_now = $mes;
        $day_now = $dia;
        $week_day_now = date("w");
        $date = $dia . " de " . $months[$month_now] . " de " . $anio;
        return $date;
    }

//-----Fecha para MySQL

    function fecha_mysql() {
        $year_now = date("Y");
        $month_now = date("m");
        $day_now = date("d");

        $fecha = $year_now . "-" . $month_now . "-" . $day_now;

        return $fecha;
    }

    function anio_mysql() {
        $year_now = date("Y");
        $month_now = date("m");
        $day_now = date("d");

        $fecha = $year_now;

        return $fecha;
    }

}

?>
