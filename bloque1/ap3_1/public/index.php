<?php


require_once __DIR__ . '/../src/controllers/controller.php';


$controlador = new ProductoController();
$controlador->mostrarProductos();