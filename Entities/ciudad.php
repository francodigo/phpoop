<?php


class Ciudad {
    private $id_ciudad;
    private $descripcion;
    
    public function __construct($id_ciudad,$descripcion) {
        $this->id_ciudad = $id_ciudad;
        $this->descripcion = $descripcion;
    }
    
    function getId_ciudad() {
        return $this->id_ciudad;
    }

    function getDescripcion() {
        return $this->descripcion;
    }


}
