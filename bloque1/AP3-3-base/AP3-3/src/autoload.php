<?php
//Nos devuelve la ruta de la carpeta del proyecto/src;
$rutaActual = dirname(__FILE__);
//Incluimos la ruta como parte de include_path, desde src.
//He corregido el fallo que nos daba porque había escrito mal un texto y funciona sin problema en PHP 8
set_include_path(get_include_path() . PATH_SEPARATOR . $rutaActual);

function autoload(string $rutaclase)
{
    //Remplazamos App( en este caso AP33 por ser la AP3-3) por "" y \ por /
    $rutaclase = str_replace(["AP33\\", "\\"], ["", "/"], $rutaclase);
    //Le añadimos la extensión al archivo
    $rutaclase .= ".php";
    //Y la incluimos
    include_once $rutaclase;
}

//Registramos la función
spl_autoload_register("autoload");
?>