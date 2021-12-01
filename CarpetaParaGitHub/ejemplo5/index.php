<?php

//Incluyo los archivos necesarios
require("./model/Coche.php");
require("./controller/CocheController.php");

//Instancio el controlador
$controller = new CocheController;

//Ejecuto el método
$controller->index();
