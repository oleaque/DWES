<?php
$base=0;
$altura=0;
$radio=0;
$arear=0;
$radioc=0;
$opcion="";
$area=0;

  function calcularAreaTriangulo($base, $altura){
    $area=$base*$altura/2;
}

  function calcularAreaRectangulo($base, $altura){
    $arear=$base*$altura;

}
  function calcularAreaCirculo($radio){
    $radioc=3.14*$radio*$radio;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcion = $_POST['forma'] ?? "";
    $base = $_POST['base'] ?? 0;
    $altura = $_POST['altura'] ?? 0;
    $radio = $_POST['radio'] ?? 0;
}

if ($opcion == "triangulo" && $base > 0 && $altura > 0) {
    $area = calcularAreaTriangulo($base, $altura);
} elseif ($opcion == "rectangulo" && $base > 0 && $altura > 0) {
    $area = calcularAreaRectangulo($base, $altura);
} elseif ($opcion == "circulo" && $radio > 0) {
    $area = calcularAreaCirculo($radio);
}

if ($area > 0) {
    if ($opcion == "triangulo") {
        echo "El área del triángulo es: $area<br>";
    } elseif ($opcion == "rectangulo") {
        echo "El área del rectángulo es: $area<br>";
    } elseif ($opcion == "circulo") {
        echo "El área del círculo es: $area<br>";
    }
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

