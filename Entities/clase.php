<?php

class Clase {
    private $id_clase;
    private $descripcion;
    
    function __construct($id_clase, $descripcion) {
        $this->id_clase = $id_clase;
        $this->descripcion = $descripcion;
    }
    
    function getId_clase() {
        return $this->id_clase;
    }

    function getDescripcion() {
        return $this->descripcion;
    }


}
