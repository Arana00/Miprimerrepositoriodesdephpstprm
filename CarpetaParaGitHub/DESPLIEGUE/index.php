<?php
    echo "Ángel Arana Barco"
?>


<?php
$db = new PDO('mysql:host=localhost;dbname=prueba', 'usuario-prueba', '');



$registros = $db->exec('INSERT INTO personas (nombre) VALUES ("Ángel"),("Arana")');
if ($registros) {
    echo "Se han activado $registros registros.";

}

//Select con OBJ
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch(PDO::FETCH_OBJ)){ //Recorro el resultado
    echo $personas->id." ".$personas->nombre." ".$personas->activo."<br>";
}

echo "<br>";


