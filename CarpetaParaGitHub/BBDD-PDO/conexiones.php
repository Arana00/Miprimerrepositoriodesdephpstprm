<?php

//concexión a la BBDD


//@ delante de $db no es obligatorio pero me permite ignorar errores en la ejecución
@$db = new mysqli('localhost', 'usuario-prueba', '', 'prueba');
if ($db->connect_errno != null) {
    echo "Error número $db->connect_errno conectando a la base de datos.<br>Mensaje: $db->connect_error.";
    exit();
} else {
    echo "conexión establecida.<br>";
}

//Configurar el juego de caracteres
$db->set_charset('utf8');

//Insert
//$query = $db->query('INSERT INTO personas (nombre) VALUES ("José"),("Luís")');

//Delete
$query = $db->query('DELETE FROM personas WHERE id>17');

//Update
$registros = $db->query('UPDATE personas SET activo=1 WHERE activo=0');
if ($registros) {
    echo "Se han activado $db->affected_rows registros.";
}
echo "<br>";

//Select en un array con claves asociativas y numéricas (con MYSQLI_STORE_RESULT, da igual ponerlo que no)
$resultado = $db->query('SELECT * FROM personas');
$personas = $resultado->fetch_array(MYSQLI_BOTH); //O también $resultado->fetch_array()
while ($personas != null) { //Recorro el resultado
    echo "<br>";
    print_r($personas);
    echo "<br>";
    echo $personas['id'] . " " . $personas[1] . " " . $personas['activo'] . "";
    $personas = $resultado->fetch_array(MYSQLI_BOTH);
}
$resultado->free(); //Libero de la memoria
echo "<br>";

//Select en un array con claves asociativas
$resultado = $db->query('SELECT * FROM personas');
$personas = $resultado->fetch_array(MYSQLI_ASSOC); //O también $resultado->fetch_assoc()
while ($personas != null) { //Recorro el resultado
    echo "<br>";
    print_r($personas);
    echo "<br>";
    echo $personas['id'] . " " . $personas['nombre'] . " " . $personas['activo'] . "";
    $personas = $resultado->fetch_array(MYSQLI_ASSOC);
}
$resultado->free(); //Libero de la memoria
echo "<br>";

//Select en un array con claves numéricas
$resultado = $db->query('SELECT * FROM personas');
$personas = $resultado->fetch_array(MYSQLI_NUM); //O también $resultado->fetch_row()
while ($personas != null) { //Recorro el resultado
    echo "<br>";
    print_r($personas);
    echo "<br>";
    echo $personas[0] . " " . $personas[1] . " " . $personas[2] . "";
    $personas = $resultado->fetch_array(MYSQLI_NUM);
}
$resultado->free(); //Libero de la memoria
echo "<br>";

//Select en un objeto
$resultado = $db->query('SELECT * FROM personas');
$personas = $resultado->fetch_object();
while ($personas != null) { //Recorro el resultado
    echo $personas->id . " " . $personas->nombre . " " . $personas->activo . "";
    $personas = $resultado->fetch_object();
}
$resultado->free(); //Libero de la memoria
echo "<br>";

//Cierro la conexión
$db->close();