<?php

namespace ENTITIES;
require_once 'baseEntitie.php';

class Pasajero extends \BaseEntitie{

    private $documento;
    private $nombre;
    private $vuelo;
    private $clase;

    function __construct() {
	
    }

    function setDocumento($documento) {
	$this->documento = $documento;
    }

    function setNombre($nombre) {
	$this->nombre = $nombre;
    }

    function setVuelo($vuelo) {
	$this->vuelo = $vuelo;
    }

    function setClase($clase) {
	$this->clase = $clase;
    }

        
    function getDocumento() {
	return $this->documento;
    }

    function getNombre() {
	return $this->nombre;
    }

    function getVuelo() {
	return $this->vuelo;
    }

    function getClase() {
	return $this->clase;
    }

    

}
