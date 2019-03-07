<?php
namespace OPERACIONES;
require_once '../main.php';
use CONEXION\Base as Base;

//use CONEXION\Base;
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
                                        on c1.id_ciudad = v.id_origen
                                        join ciudades c2
                                        on c2.id_ciudad = v.id_destino");
            $stmt->execute();
	    return $stmt->fetchAll(\PDO::FETCH_CLASS,'ENTITIES\Vuelo');
            //return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                                        on c1.id_ciudad = v.id_origen
                                        join ciudades c2
                                        on c2.id_ciudad = v.id_destino
                                        where id_vuelo = :id_vuelo";
            $stmt = $this->pdo->prepare($query);
	    $stmt->setFetchMode(\PDO::FETCH_CLASS,'ENTITIES\Vuelo');
            $stmt->bindParam(':id_vuelo',$id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function obtenerCiudades(){
	try{
	    $query = "select id_ciudad, descripcion from ciudades";
	    $stmt = $this->pdo->prepare($query);
	    $stmt->setFetchMode(\PDO::FETCH_CLASS,'ENTITIES\Ciudad');
	     $stmt->execute();
            return $stmt->fetchAll();
	} catch (Exception $ex) {
	    echo $ex->getMessage();
	}
    }
    
    public function obtenerPasajeros($id_vuelo){
	try{
	    $query = "SELECT p.documento,p.nombre,c.descripcion clase FROM
			pasajeros p
			JOIN clases c
			ON p.id_clase = c.id_clase
			AND p.id_vuelo = :id";
	    $stmt = $this->pdo->prepare($query);
	    $stmt->bindParam(':id',$id_vuelo);
	    $stmt->execute();
	    return $stmt->fetchAll(\PDO::FETCH_CLASS,'ENTITIES\Pasajero');
	} catch (Exception $ex) {
	    echo $ex->getMessage();
	}
    }
    
    public function obtenerClases(){
	try{
	    $query = "select id_clase,descripcion from clases";
	    $stmt = $this->pdo->prepare($query);
	    $stmt->execute();
	    return $stmt->fetchAll(\PDO::FETCH_CLASS,'\ENTITIES\Clase');
	} catch (Exception $ex) {
	    echo $ex->getMessage();
	}
    }
    
    public function guardarPasajero($pasajero){
	try{
	    $query = "insert into pasajeros (documento,nombre,id_vuelo,id_clase) values (:doc,:nombre,:vuelo,:clase)";
	    $stmt = $this->pdo->prepare($query);
	    $documento = $pasajero->documento;
	    $nombre = $pasajero->nombre;
	    $vuelo = $pasajero->vuelo;
	    $clase = $pasajero->clase;
	    $stmt->bindParam(':doc',$documento);
	    $stmt->bindParam(':nombre',$nombre);
	    $stmt->bindParam(':vuelo',$vuelo);
	    $stmt->bindParam(':clase',$clase);
	    $stmt->execute();
	    $result = $stmt->rowCount();
	    if($result == 0){
		throw new \Exception("No se pudo realizar la operación, intente mas tarde");
	    }else {
		$_SESSION['mensaje'] = "Pasajero agregado correctamente";
		header("Location:../paginas/modificar.php?id_vuelo=$vuelo");
	    }
	} catch (Exception $ex) {
	    $_SESSION['mensaje'] = $ex->getMessage();
	    //echo $ex->getMessage();
	    header("Location:../error.php");
	}
    }
}
