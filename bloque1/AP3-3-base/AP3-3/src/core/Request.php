<?php

namespace AP33\Core;

class Request
{
    private $route;
    private $params;

    public function __construct()
    {
        /**
         * Lo primero que hacemos es confirmar que hemos recibido por GET un controller
         * si no fuera así saldremos por la ruta por defecto.
         */
        if (isset($_GET["ruta"])) {
            $this->route = $_GET["ruta"];
            if (isset($_GET["params"])) {
                //En este caso estamos úsando las, como separador de los parámetros.
                $this->params = explode(",", $_GET["params"]);

            } else {
                $this->params = null;
            }
        } else {
            $this->route = "main";
            $this->params = null;
        }
        //echo $this->route;
    }

    /**
     * Get the value of route
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Get the value of parms
     */
    public function getParams()
    {
        return $this->params;
    }
}

?>