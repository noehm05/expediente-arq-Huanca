<?php

interface IReglaDeReposicion
{
    public function calcularPrioridad($stock, $ventas);
}

class PrioridadPorStock implements IReglaDeReposicion
{
    public function calcularPrioridad($stock, $ventas)
    {
        return 100 - $stock;
    }
}

class PrioridadPorVentas implements IReglaDeReposicion
{
    public function calcularPrioridad($stock, $ventas)
    {
        return $ventas * 10;
    }
}

class PrioridadMixta implements IReglaDeReposicion
{
    public function calcularPrioridad($stock, $ventas)
    {
        return (100 - $stock) + ($ventas * 10);
    }
}


class GestorDeReposicion
{
    private $regla;

    public function __construct(IReglaDeReposicion $regla)
    {
        $this->regla = $regla;
    }

    public function calcular($stock, $ventas)
    {
        return $this->regla->calcularPrioridad($stock, $ventas);
    }
}


// PRUEBA

$stock = 20;
$ventas = 8;

$gestor = new GestorDeReposicion(
    new PrioridadPorStock()
);

echo "Prioridad por stock: ";
echo $gestor->calcular($stock, $ventas);

echo "<br>";

$gestor = new GestorDeReposicion(
    new PrioridadPorVentas()
);

echo "Prioridad por ventas: ";
echo $gestor->calcular($stock, $ventas);

echo "<br>";


$gestor = new GestorDeReposicion(
    new PrioridadMixta()
);

echo "Prioridad mixta: ";
echo $gestor->calcular($stock, $ventas);

?>
