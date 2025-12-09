<?php

require_once __DIR__ . '/../models/model.php';
require_once __DIR__ . '/../views/view.php';

class ProductoController
{
    public function mostrarProductos()
    {

        $producto = new producto();

        $productos = $producto->obtenerTodos();

        $vista = new ProductosVista();
        $vista->setProductos($productos);
        $vista->mostrar();
    }
}
