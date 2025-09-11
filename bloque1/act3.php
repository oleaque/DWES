<?php
$suma=0;
$numeros=[
    1 => "primero",
    3 => "segundo",
    5 => "tercero",
    7 => "cuarto",
    9 => "quinto",
    11 => "sexto",
];

    foreach($numeros as $clave=>$valor){
        if($valor== "primero" || $valor== "tercero" || $valor== "quinto"){
            $impar=true;
            echo "estas en una posicion impar ";
            $par= false;
        }if($valor== "segundo" || $valor== "cuarto" || $valor== "sexto"){
            $par=true;
            echo "estas en una posicion par ";
         $impar= false;
        } $suma+=$clave;
        echo $suma;

    } if($suma>5&&$suma<10){
        echo"el valor de la suma es mayor que 5";
}elseif($suma>10){
        echo"el valor de la suma es mayor que 10";
}elseif($suma>20){
        echo"el valor de la suma es mayor que 20";
}




