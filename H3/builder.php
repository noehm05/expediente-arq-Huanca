<?php

class Reporte
{
    public $tipo;
    public $fechaInicio;
    public $fechaFin;
    public $incluirVentas;
    public $incluirInventario;
    public $incluirProductos;
    public $formato;

    public function mostrar()
    {
        echo "Reporte: " . $this->tipo . "<br>";
        echo "Desde: " . $this->fechaInicio . "<br>";
        echo "Hasta: " . $this->fechaFin . "<br>";
        echo "Ventas: " . ($this->incluirVentas ? "Sí" : "No") . "<br>";
        echo "Inventario: " . ($this->incluirInventario ? "Sí" : "No") . "<br>";
        echo "Productos: " . ($this->incluirProductos ? "Sí" : "No") . "<br>";
        echo "Formato: " . $this->formato . "<br>";
    }
}


class ReporteBuilder
{
    private $reporte;

    public function __construct()
    {
        $this->reporte = new Reporte();
    }

    public function tipo($tipo)
    {
        $this->reporte->tipo = $tipo;
        return $this;
    }

    public function fechas($inicio, $fin)
    {
        $this->reporte->fechaInicio = $inicio;
        $this->reporte->fechaFin = $fin;
        return $this;
    }

    public function incluirVentas()
    {
        $this->reporte->incluirVentas = true;
        return $this;
    }

    public function incluirInventario()
    {
        $this->reporte->incluirInventario = true;
        return $this;
    }

    public function incluirProductos()
    {
        $this->reporte->incluirProductos = true;
        return $this;
    }

    public function formato($formato)
    {
        $this->reporte->formato = $formato;
        return $this;
    }

    public function build()
    {
        // VALIDACIÓN 1
        if (empty($this->reporte->tipo)) {
            throw new Exception("El reporte debe tener un tipo.");
        }

        // VALIDACIÓN 2
        if ($this->reporte->fechaInicio > $this->reporte->fechaFin) {
            throw new Exception("La fecha inicial no puede ser mayor que la fecha final.");
        }

        return $this->reporte;
    }
}


// USO DEL BUILDER

try {

    $reporte = (new ReporteBuilder())
        ->tipo("Reporte de ventas")
        ->fechas("2026-09-01", "2026-09-10")
        ->incluirVentas()
        ->incluirProductos()
        ->formato("PDF")
        ->build();

    $reporte->mostrar();

} catch (Exception $e) {

    echo "Error: " . $e->getMessage();

}

?>
