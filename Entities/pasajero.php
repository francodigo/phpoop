<?php


class Pasajero {
    
   private $documento;
   private $nombre;
   private $vuelo;
   private $clase;
   
   function __construct($documento, $nombre, $vuelo, $clase) {
       $this->documento = $documento;
       $this->nombre = $nombre;
       $this->vuelo = $vuelo;
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
