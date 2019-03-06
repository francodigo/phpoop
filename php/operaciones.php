<?php

require_once '../conexion/Base.php';
require_once '../entities/vuelo.php';

class Operaciones extends Base {

    public function __construct($user) {
        parent::__construct($user);
    }

    public function obtenerVuelos() {
        try {
            $stmt = $this->pdo->prepare("select id_vuelo,aerolinea,c1.descripcion as origen,
                                        c2.descripcion as destino
                                        from vuelos v
                                        join ciudades c1
                                        on c1.id_ciudad = v.origen
                                        join ciudades c2
                                        on c2.id_ciudad = v.destino");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function obtenerVueloXId($id){
        try{
            $query = "select id_vuelo,aerolinea,c1.descripcion as origen,
                                        c2.descripcion as destino
                                        from vuelos v
                                        join ciudades c1
                                        on c1.id_ciudad = v.origen
                                        join ciudades c2
                                        on c2.id_ciudad = v.destino
                                        where id_vuelo = :id_vuelo";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_vuelo',$id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
