<?php

class database{
        private static $instancia = null;
        private static $host = "mariadb-server";
        private static $user = 'root';
        private static $password = 'root';
        private static $database = 'AP2';
        private static $mysqli;
    private function __construct(){}

    public static function obtenerInstancia(){
        if (self::$instancia===null){
            self::$instancia=new database();
        }return self::$instancia;
    }
public function conexion()
{
    self::mysqli = new mysqli(self::host, self::user,self::password, self::database);

    if (self::mysqli->connect_error) {
        die("error conexion" . self::mysqli->connect_error);

    }
    echo 'conectada';
}



}



/*

• La conexión a la base de datos se debe hacer dentro del constructor usando la
extensión mysqli.
• La clase debe recibir los parámetros de conexión como host, usuario,
contraseña y nombre de la base de datos.
• Puedes usar cualquiera de las BBDD creadas en actividades anteriores.
También debes crear una parte del código donde instancies la clase, establezcas la
conexión a la BBDD y hagas alguna operación con ella.*/