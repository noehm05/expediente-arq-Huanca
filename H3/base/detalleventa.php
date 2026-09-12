<?php
class DetalleVenta
{
    public $idDetalle;
    public $cantidad;
    public $precio;

    public function calcularSubtotal()
    {
        return $this->cantidad * $this->precio;
    }
}

?>
