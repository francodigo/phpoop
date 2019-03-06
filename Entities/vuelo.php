<?php


class Vuelo {
    private $id_vuelo;
    private $aerolinea;
    private $origen;
    private $destino;
    
    function __construct($id_vuelo, $aerolinea, $origen, $destino) {
        $this->id_vuelo = $id_vuelo;
        $this->aerolinea = $aerolinea;
        $this->origen = $origen;
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
