<?php

interface IPrecioProducto
{
    public function obtenerPrecioBs();
}

// SISTEMA EXTERNO ARGENTINO
class ProveedorArgentino
{
    public function obtenerPrecioPesos()
    {
        // El proveedor externo entrega el precio 
       
        return 5000;
    }
}
// 3. ADAPTER


class PrecioAdapter implements IPrecioProducto
{
    private $proveedor;

    public function __construct($proveedor)
    {
        $this->proveedor = $proveedor;
    }

    public function obtenerPrecioBs()
    {
        // Obtener precio del proveedor externo
        $pesos = $this->proveedor->obtenerPrecioPesos();
        $bolivianos = ($pesos / 1000) * 7;

        return $bolivianos;
    }
}

// PRUEBA
$proveedor = new ProveedorArgentino();

$adapter = new PrecioAdapter($proveedor);

$precio = $adapter->obtenerPrecioBs();

echo "Precio del proveedor: 5000 pesos argentinos<br>";
echo "Precio adaptado para mi librería: " . $precio . " Bs";

?>

