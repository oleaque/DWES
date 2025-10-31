<?php

namespace AP33\Controllers;

use AP33\Core\DataBase;
use AP33\Views\ListadoTareas;
use AP33\Models\Tareas;

class MainContrller{
    public function main(){
        $tarea=new Tareas(new DataBase());
        new ListadoTareas($tarea->findAll());
    }

    function default(){
        echo"la ruta no existe";
    }
}