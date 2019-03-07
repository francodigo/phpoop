<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
define("ENTITIES",'Entities/');
define("PHP",'php/');
define("CONEXION",'conexion/');

/*spl_autoload_register(function($className) {
    var_dump($className);
    exit;
    $paths['Entities'] = ROOT . ENTITIES . $className . '.php';
    $paths['php'] = ROOT . PHP . $className . '.php';
    $paths['conexion'] = ROOT . CONEXION . $className . '.php';
    foreach ($paths as $path) {
        if (file_exists($path)) {
            include $path;
        }
    }
});*/

/*function autoload($className){
    var_dump($className);
    exit;
    $paths['Entities'] = ROOT . ENTITIES . $className . '.php';
    $paths['php'] = ROOT . PHP . $className . '.php';
    $paths['conexion'] = ROOT . CONEXION . $className . '.php';
    foreach ($paths as $path) {
        if (file_exists($path)) {
            include $path;
        }
    }
}
spl_autoload_register("autoload");
exit;*/
header("Location: paginas/home.php");

