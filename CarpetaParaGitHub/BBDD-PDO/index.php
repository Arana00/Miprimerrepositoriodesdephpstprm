<?php

//leo el fichero de datos
$string = file_get_contents(".clave");
//array de lineas de archivo
$lineas = explode(" ",$string);

$bbdd = $lineas[0];
$usuario = $lineas[1];
$clave = $lineas[2];
$opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

try{
    $db = new PDO("mysql:host=localhost;dbname=$bbdd", $usuario, $clave, $opciones);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo 'falló la conexión' . $e->getMessage();
}
