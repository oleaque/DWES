<?php
$base=0;
$altura=0;
$radio=0;
$area=0;


function calcularAreaTriangulo($base, $altura){
    return $area=$base*$altura/2;
}

function calcularAreaRectangulo($base, $altura){
   return $arear=$base*$altura;

}
function calcularAreaCirculo($radio){
    return 3.14*$radio ;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['forma'])) {
        $forma = $_POST['forma'];
        $base = $_POST['base'];
        $altura = $_POST['altura'];
        $radio = $_POST['radio'];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $forma = $_POST['forma'] ;
    $base = $_POST['base'];
    $altura = $_POST['altura'] ;
    $area= calcularAreaRectangulo($base,$altura);
    echo" el area del rectangulo es $area";

    $base = $_POST['base'];
    $altura = $_POST['altura'] ;
    $area= calcularAreaTriangulo($base,$altura);
    echo" el area del triangulo es $area";

    $radio = $_POST['radio'];
    $area= calcularAreaCirculo($radio);
    echo" el area del circulo es $area";

}


?>


<form action="#" method="post">

    <select id="forma" name="forma" required>
        <option value=""></option>
        <option value="triangulo">triangulo</option>
        <option value="rectangulo">rectangulo</option>
        <option value="circulo">circulo</option>

    </select>
</form><br>

<form method="POST">
    <label for="base">Base:</label>
    <input type="number" name="base" id="base" required><br><br>

    <label for="altura">Altura:</label>
    <input type="number" name="altura" id="altura" required><br><br>

    <label for="radio">Radio:</label>
    <input type="number" name="radio" id="radio"><br><br>

    <button type="submit">enviar</button>

</form>

