<?php
class ProductoVista{
    private  $lista;
    public function __construct(){

    }
    public function setLista($lista){
        $this->lista=$lista;
    }
    public function mostrar(){
        $html='<!DOCTYPE html>
<html>
<head>
    <title>Lista de productos</title>
</head>
<body>
    <h1>Lista de productos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
        </tr>';
        foreach($this->lista as $lista){
            $html .= '<tr>
            <td>' . htmlspecialchars($lista['titulo']) . '</td>
            <td>' . htmlspecialchars($lista['keywords']) . '</td>
            <td>' . number_format($lista['descripcion'], 2) . ' </td>
            <td>' . htmlspecialchars($lista['contenido']) . '</td>
        </tr>';
        }
            $html .= '
            </table>
</body>
</html>';

        echo $html;

    }
}