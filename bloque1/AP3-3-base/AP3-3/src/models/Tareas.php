<?php

namespace AP33\Models;

use AP33\Core\DataBase;

class Tareas{
    private DataBase $database;
    public function __construct(DataBase $database)
    {
        $this->database = $database;
    }
    public function findAll(){
        $sql = "SELECT * FROM tareas";
        return $this->database->executeSQL($sql);
    }

    public function findById($id){
        $sql = "SELECT * FROM tareas WHERE id =$id";
        $result = $this->database->executeSQL($sql);
        return array_shift($result);
    }
}