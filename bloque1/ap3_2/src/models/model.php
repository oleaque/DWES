<?php
require_once __DIR__ . "/../core/database.php";
class Producto{
    private $lista;
    public function __construct()
    {
    }
    public function getTodas()
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM tareas";
        $result = $db->executeSQL($sql);
        $tareas = [];
        foreach ($result as $row) {
            $tareas[] = $row;
        }
        $this->data = $tareas;
        return $this->data;
    }
    public function getTaskById($id)
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM tareas WHERE id = :id";
        $params = ['id' => $id];
        $result = $db->executeSQL($sql, $params);
        return $result ? $result[0] : null;
    }
}