<?php

class database{
private $host = "mariadb-server";
private $user = 'root';
private $password = 'root';
private $database = 'AP1';
private $mysqli;

public function __construct()
{
    $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);

    if ($this->mysqli->connect_error) {
        die("error conexion" . $this->mysqli->connect_error);

    }
        echo 'conectada';

}
public function select($sql)
{

    $result = $this->mysqli->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "El usuario " . $row['nombre'] . " posee el ID " . $row['id'] . " y su estado es: " . $row['estado'];
        }
    } else {
        echo "no se puede hacer el select" . $this->mysqli->error;
    }
}

public function insert($sql)
{
    if ($this->mysqli->query($sql) === true) {
        echo "Se ha realizado la inserción con la nueva id:" . $this->mysqli->insert_id;
    } else {
        echo "no se pudede insertar" . $this->mysqli->error;

    }
}
public function update($sql)
{

    if ($this->mysqli->query($sql) === true) {
        echo "se ha realizado correctamente la actualizacion " ;
    } else {
        echo "error no se ha podido hacer el update" . $this->mysqli->error;
    }
}
public function delete($sql)
{
    if ($this->mysqli->query($sql) === true) {
        echo " se ha realizado correctamente el borrado de la ";
    } else {
        echo "error no se ha podido borrar" . $this->mysqli->error;
    }
}public function cerrar()
{
 $this->mysqli->close();
    echo"conexion cerrada";
    }
}



$db= new database();

$db->select("select * from usuarios");

    $nombrein = "nachoOoo";
$estadoin = "1";
$db->insert("insert into usuarios(nombre,estado) values ('$nombrein','$estadoin')");
$db->update("update usuarios set estado = '1' where nombre = '$nombrein' ");
$db->delete("delete from usuarios where nombre = '$nombrein' ");
$db->cerrar();






