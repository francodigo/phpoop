<?php
require_once '../php/operaciones.php';
$id = $_GET['id_vuelo'];
$op = new Operaciones('root');
$vuelo = $op->obtenerVueloXId($id);
var_dump($vuelo);
exit;


