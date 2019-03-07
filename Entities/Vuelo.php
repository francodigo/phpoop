<?php
namespace ENTITIES;
require_once 'baseEntitie.php';
class Vuelo extends \BaseEntitie{
    private $id_vuelo;
    private $aerolinea;
    private $origen;
    private $destino;
    
    /*function __construct($id_vuelo, $aerolinea, $origen, $destino) {
        $this->id_vuelo = $id_vuelo;
        $this->aerolinea = $aerolinea;
        $this->origen = $origen;
        $this->destino = $destino;
    }*/
    public function __construct() {
	
    }
    
    function setId_vuelo($id_vuelo) {
	$this->id_vuelo = $id_vuelo;
    }

    function setAerolinea($aerolinea) {
	$this->aerolinea = $aerolinea;
    }

    function setOrigen($origen) {
	$this->origen = $origen;
    }

    function setDestino($destino) {
	$this->destino = $destino;
    }

        
    function getId_vuelo() {
        return $this->id_vuelo;
    }

        function getAerolinea() {
        return $this->aerolinea;
    }

    function getOrigen() {
        return $this->origen;
    }

    function getDestino() {
        return $this->destino;
    }
}
