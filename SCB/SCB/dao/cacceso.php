<?php

/**
 *
 * @Clase para validar el acceso al sistema. "sql_acceso.php"
 * @versión: 0.1      @modificado:   15 de Abril del 2013
 * @autor: JMST
 *
 */
class Cacceso {

    private $id;
    private $nombre;
    private $tipo;

    public function __construct($id1, $nombre1, $tipo1) {
        $this->id = $id1;
        $this->nombre = $nombre1;
        $this->tipo = $tipo1;
    }

    public function getid() {
        return $this->id;
    }

    public function getnombre() {
        return $this->nombre;
    }

    public function gettipo() {
        return $this->tipo;
    }

}

?>
