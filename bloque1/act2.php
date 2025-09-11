<?php

$array=$_GET;
foreach($array as $clave=>$valor) {
    if ($valor=="null"){
        echo "no se ha recibido ningun dato o es un valor nulo.<br>";
    } elseif (is_numeric($valor)) {
        echo "se ha recibido un numero.<br>";
    } else {
        echo "se ha recibido una cadena de caracteres.<br>";
    }
}