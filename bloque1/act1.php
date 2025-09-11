<?php


$array=$_GET;
foreach($array as $clave=>$valor){
    echo "se ha recibido $valor para la clave $clave.<br>";
}