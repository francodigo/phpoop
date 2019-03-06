<?php
class Base {
    private $host;
    private $user;
    private $pwd;
    protected $pdo;
    
    public function __construct($user){
        $this->host = "mysql:host=localhost;dbname=oop";
        //$this->user='root';
        $this->user= $user;
        $this->pwd = '';
        self::generarConexion();
    }
     
    private function generarConexion(){
        try{
         $this->pdo = new PDO($this->host,$this->user,$this->pwd);
        } catch (Exception $ex) {
            var_dump("Che, ,no anda");
            //header("Location: http://localhost/oop/proyecto/conexion/base.php");
            //exit;
        }
    }
}
