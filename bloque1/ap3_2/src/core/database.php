<?php
class Database{
    private static $dbConfig;
    private static $instancia;
    private static $conexion;
    private function __construct(){
        $configPath = __DIR__ . '/../../config/dbConfig.json';
        if (!file_exists($configPath)) {
            die('No se encuentra el archivo de configuración  ');
        }
        self::$dbConfig = json_decode(file_get_contents($configPath), true);
        if (!self::$dbConfig) {
            die('Error al leer el archivo de configuración  ');
        }
        $this->getConnection();

    }

    public function getinstance(){
        if (self::$instancia==null){
            self::$instancia=new Database();
        }
        return self::$instancia;
    }

    private function getConnection(){
        $host = self::$dbConfig["host"];
        $username = self::$dbConfig["user"];
        $password = self::$dbConfig["password"];
        $database = self::$dbConfig["database"];

self::$conexion = new mysqli($host, $username, $password, $database);
}
public function execute($sql){
    return self::$conexion->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function __destruct()
    {
        if (self::$conexion != null) {
            self::$conexion->close();
        }
    }

}