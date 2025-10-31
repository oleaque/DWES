<?php

namespace AP33\Views;
class DetalleTarea
{

    public function __construct(array $row = null)
    {


        if (is_null($row)) {
            echo "error no se han recibido datos";
            echo "<p><a href='/?ruta=default'>Volver</p>";
        } else {
            if (count($row) > 0) {
                echo "<table border='1'>";
                echo "<tr><td>ID</td><td>titulo</td><td>fechaC</td><td>fechaV</td></tr>";
                echo "<tr><td>" . $row["id"] .
                    "<td>" . $row["titulo"] .
                    "<td>" . $row["fechaC"] .
                    "<td>" . $row["fechaV"] .
                    "<td><a href='/?ruta=main'> volver</td></tr>";
                echo "</table>";
            } else {
                echo "0 results";
                echo "<p><a href='/?ruta=main'>Volver </p>";
            }
        }
    }
}

