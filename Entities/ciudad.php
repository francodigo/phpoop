<?php

namespace ENTITIES;
require_once 'baseEntitie.php';

class Ciudad extends \BaseEntitie {

    private $id_ciudad;
    private $descripcion;

    /* public function __construct($id_ciudad,$descripcion) {
      $this->id_ciudad = $id_ciudad;
      $this->descripcion = $descripcion;
      } */

    function __construct() {
	
    }

    function setId_ciudad($id_ciudad) {
	$this->id_ciudad = $id_ciudad;
    }

    function setDescripcion($descripcion) {
	$this->descripcion = $descripcion;
    }

    function getId_ciudad() {
	return $this->id_ciudad;
    }

    function getDescripcion() {
	return $this->descripcion;
    }
}
