<?php

namespace ENTITIES;

require_once 'baseEntitie.php';

class Clase extends \BaseEntitie {

    private $id_clase;
    private $descripcion;

    function __construct() {
	
    }

    function setId_clase($id_clase) {
	$this->id_clase = $id_clase;
    }

    function setDescripcion($descripcion) {
	$this->descripcion = $descripcion;
    }

    function getId_clase() {
	return $this->id_clase;
    }

    function getDescripcion() {
	return $this->descripcion;
    }

}
