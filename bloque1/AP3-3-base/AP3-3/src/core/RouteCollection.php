<?php

namespace AP33\Core;

/**
 * Clase que se encarga de obtener las rutas por defecto que tiene la aplicación
 */
class RouteCollection
{
    private $routes;

    /**
     * Cargamos en la variable routes los datos de las rutas que tiene la aplicación defínidas como posibles URI accesibles
     */
    function __construct()
    {
        $this->routes = json_decode(file_get_contents(__DIR__ . "/../../config/rutas.json"), true);
    }

    /**
     * Get the value of routes
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}

?>
