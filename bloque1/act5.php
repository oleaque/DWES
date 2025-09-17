<?php

$host = "mariadb-server";
$user = 'root';
$password = 'root';
$database = 'AP1';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_errno) {
    die('error conexion') . $mysqli->connect_errno;

}
echo 'conectada';

$sql = "select * from usuarios";
$result = $mysqli->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "El usuario " . $row['nombre'] . " posee el ID " . $row['id'] . " y su estado es: " . $row['estado'];

}
$nombrein="nachoOoo";
$estadoin="1";

$sql2= "insert into usuarios (nombre, estado) values ('$nombrein', $estadoin) ";
if ($mysqli->query($sql2)===true){
    echo"Se ha realizado la inserción con la nueva id: $mysqli->insert_id ";
}else{
    echo"no se pudede insertar";
}

$sql3= "update usuarios set estado = '1' where nombre = '$nombrein' ";
if ($mysqli->query($sql3)===true){
    echo "se ha realizado correctamente la actualizacion de la" . $mysqli->insert_id;
}else{
    echo "error no se ha podido hacer";
}

$sql4="delete from usuarios where nombre = '$nombrein' ";
if ($mysqli->query($sql4)===true){
    echo" se ha realizado correctamente el borrado de la " . $mysqli->insert_id;
}else{
    echo "error no se ha podido borrar";
}

$mysqli->close();