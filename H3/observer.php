<?php
interface IInteresadoEnStock
{
    public function avisar($producto);
}


class Encargada implements IInteresadoEnStock
{
    public function avisar($producto)
    {
        echo "Encargada: stock bajo de " . $producto . "<br>";
    }
}

class Duena implements IInteresadoEnStock
{
    public function avisar($producto)
    {
        echo "Dueña: revisar stock de " . $producto . "<br>";
    }
}


class Inventario
{
    private $interesados = array();

    public function suscribir($interesado)
    {
        $this->interesados[] = $interesado;
    }

    public function detectarStockBajo($producto)
    {
        echo "Inventario: stock bajo de " . $producto . "<br>";

        foreach ($this->interesados as $interesado)
        {
            $interesado->avisar($producto);
        }
    }
}


// PRUEBA
$inventario = new Inventario();

$inventario->suscribir(new Encargada());
$inventario->suscribir(new Duena());

$inventario->detectarStockBajo("Cuaderno");

?>
