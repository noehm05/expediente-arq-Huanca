<?php

interface IRegistroCliente
{
    public function registrar($cliente);
}

class RegistroCliente implements IRegistroCliente
{
    public function registrar($cliente)
    {
        echo "Cliente registrado: " . $cliente . "<br>";
    }
}

abstract class CapaDeRegistro implements IRegistroCliente
{
    protected $interno;

    public function __construct(IRegistroCliente $interno)
    {
        $this->interno = $interno;
    }

    abstract public function registrar($cliente);
}

class ConPuntos extends CapaDeRegistro
{
    public function __construct(IRegistroCliente $interno)
    {
        parent::__construct($interno);
    }

    public function registrar($cliente)
    {
        $this->interno->registrar($cliente);

        echo "Se agregaron puntos de fidelidad.<br>";
    }
}

class ConDescuento extends CapaDeRegistro
{
    public function __construct(IRegistroCliente $interno)
    {
        parent::__construct($interno);
    }

    public function registrar($cliente)
    {
        $this->interno->registrar($cliente);

        echo "Se agregó un descuento especial.<br>";
    }
}


$cliente1 = new ConDescuento(
    new ConPuntos(
        new RegistroCliente()
    )
);

echo "PRIMERA COMBINACIÓN:<br>";

$cliente1->registrar("Maria");

echo "<br>";

$cliente2 = new ConDescuento(
    new RegistroCliente()
);

echo "SEGUNDA COMBINACIÓN:<br>";
$cliente2->registrar("Juan");

?>
