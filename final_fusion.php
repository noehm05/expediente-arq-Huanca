<?php

// CONTRATO DE STRATEGY
interface IReglaDeReposicion
{
    public function calcularReposicion($stock, $ventas);
}

class ReposicionNormal implements IReglaDeReposicion
{
    public function calcularReposicion($stock, $ventas)
    {
        $stockDeseado = 20;

        return $stockDeseado - $stock;
    }
}

class ReposicionPorVentas implements IReglaDeReposicion
{
    public function calcularReposicion($stock, $ventas)
    {
        return $ventas - $stock;
    }
}


// CONTRATO DE OBSERVER
interface IInteresadoEnStock
{
    public function avisar($producto, $cantidad);
}

class Encargada implements IInteresadoEnStock
{
    public function avisar($producto, $cantidad)
    {
        echo "Encargada: hay que reponer ";
        echo $cantidad . " unidades de " . $producto . ".<br>";
    }
}

class Duena implements IInteresadoEnStock
{
    public function avisar($producto, $cantidad)
    {
        echo "Dueña: revisar reposición de ";
        echo $producto . ". Se necesitan " . $cantidad . " unidades.<br>";
    }
}

// INVENTARIO

class Inventario
{
    private $regla;
    private $interesados = array();


    public function __construct(IReglaDeReposicion $regla)
    {
        $this->regla = $regla;
    }


    public function suscribir($interesado)
    {
        $this->interesados[] = $interesado;
    }


    // el stock
    public function revisarStock($producto, $stock, $ventas)
    {
        echo "<h3>Revisión de inventario</h3>";

        echo "Producto: " . $producto . "<br>";
        echo "Stock actual: " . $stock . "<br>";
        echo "Ventas realizadas: " . $ventas . "<br><br>";


        // STRATEGY
  
        $cantidadAReponer =
            $this->regla->calcularReposicion($stock, $ventas);


        echo "Cantidad a reponer: "
            . $cantidadAReponer . " unidades.<br><br>";


        // OBSERVER
        if ($cantidadAReponer > 0)
        {
            echo "Se detectó necesidad de reposición.<br><br>";

            foreach ($this->interesados as $interesado)
            {
                $interesado->avisar(
                    $producto,
                    $cantidadAReponer
                );
            }
        }
        else
        {
            echo "No es necesario reponer.<br>";
        }
    }
}



$inventario = new Inventario(
    new ReposicionNormal()
);


$inventario->suscribir(new Encargada());
$inventario->suscribir(new Duena());
$producto = "Cuaderno";
$stock = 5;
$ventas = 10;

$inventario->revisarStock(
    $producto,
    $stock,
    $ventas
);

?>
