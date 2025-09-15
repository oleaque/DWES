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

$sql= "insert into usuarios (nombre, id, estado) values ('nacho', '67', '0') ";
    if ($mysqli->query($sql)===true){
        echo"Se ha realizado la inserción con la nueva id:" . $row['id'];
    }else{
        echo"no se pudede insertar";
    }

$sql= "update usuarios set estado = '1' where nombre = 'nacho' ";
    if ($mysqli->query($sql)===true){
        echo "se ha realizado correctamente la actualizacion de la" . $row['id'];
    }else{
        echo "error no se ha podido hacer";
    }

$sql="delete from usuarios where nombre = 'nacho'";
    if ($mysqli->query($sql)===true){
        echo" se ha realizado correctamente el borrado de la " . $row['id'];
    }else{
        echo"error no ha sido posible";
    }

$mysqli->close();


