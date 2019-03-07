<?php
session_start();
$mensaje = "";
if(isset($_SESSION['mensaje'])){
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
}
echo ($mensaje =! "")? $mensaje :"<h1>Che mira que explotó</h1>";