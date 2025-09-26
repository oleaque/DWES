<?php

class vehiculoCarrera
{
    protected $marca;
    protected $modelo;
    protected $velocidad;
    protected $combustible;

    public function __construct($marca, $modelo, $velocidad, $combustible)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->combustible = $combustible;
    }

    protected function consumirCombustible($combustible, $velocidad)
    {
        if ($this->velocidad > 1 && $this->velocidad < 10) {
            echo $this->combustible - 0.1;
        }
    }

    public function arrancar($velocidad)
    {
        if ($this->velocidad > 1) {
            echo "el coche esta encendido";
        }

    }public function acelerar($velocidad){
        if($this->velocidad>15){
            echo "el coche esta acelerando";
        }
}public function detener($velocidad){
        if($this->velocidad<1){
            echo "el coche se ha detenido";
        }
}public function mostrarEstado($marca,$modelo,$velocidad,$combustible){
        echo "la marca es: $this->marca";
    echo "el modelo es: $this->modelo";
    echo " la velocidad es: $this->velocidad";
    echo "el combustible: $this->combustible";
} public function __destruct()
{
    echo "el $this->modelo se ha retirado";
}


} class cocheF1 extends vehiculoCarrera{

    private $alerones;

    pubic function __construct($marca, $modelo, $velocidad, $combustible,$alerones)
    {
        parent::__construct($marca, $modelo, $velocidad, $combustible);
        $this->alerones=$alerones;
    }public function activarDRS($velocidad,$alerones){
        if($alerones==true){
            echo"$this->velocidad la velocidad aumenta 40";
        }
    }

}class cocheElectricoF1{
pubic function __construct($marca, $modelo, $velocidad, $combustible,$bateria){
    parent::__construct($marca, $modelo, $velocidad, $combustible);
        $this->bateria=$bateria;
    }
    public function recargar($bateria){
        if($this->bateria<15){
            echo"hay que recargar el vehiculo ";
        }
    }

}
