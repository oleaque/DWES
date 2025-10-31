<?php
class Producto{
    private $lista;
    public function __construct(){
        $this->lista=[
        "title" => "MVC Sencillo PHP",
            "keyworks" => "arquitectura de software, poo, mvc, php",
            "description" => "ponemos en práctica el MVC en PHP",
            "content" => "El contenido del presente ejercico corresponde a la creación de
 un modelo vista controlado, MVC en adelante, mediante el lenguaje
 de programación PHP de una forma sencilla y haciendo uso de los
 conocimientos previos que tienen los alumnos."
 ];
    }
    public function obtenerTodos(){
        return $this->lista;
    }
}