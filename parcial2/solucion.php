<?php
// Solucion: Noelia Huanca Mamani
interface IInteresadoPrestamo
{
    public function cuandoVence($socio);
}

class CorreoSocio implements IInteresadoPrestamo
{
    public function cuandoVence($socio)
    {
        echo "[CORREO] Aviso enviado al socio: $socio<br><br>";
    }
}

class RegistroMorosidad implements IInteresadoPrestamo
{
    public function cuandoVence($socio)
    {
        echo "[MOROSIDAD] Se registro atraso del socio: $socio<br><br>";
    }
}

class PantallaRecepcion implements IInteresadoPrestamo
{
    public function cuandoVence($socio)
    {
        echo "[RECEPCION] Mostrar aviso de atraso de: $socio<br><br>";
    }
}


class ModuloPrestamos
{
    private $interesados = [];

    public function suscribir($interesado)
    {
        $this->interesados[] = $interesado;
    }
    public function registrarVencimiento($socio)
    {
        echo "<hr>";
        echo "<b>Prestamo vencido: $socio</b><br><br>";

        foreach ($this->interesados as $interesado)
        {
            $interesado->cuandoVence($socio);
        }

        echo "<hr>";
    }
}

$prestamos = new ModuloPrestamos();

$prestamos->suscribir(new CorreoSocio());
$prestamos->suscribir(new RegistroMorosidad());
$prestamos->suscribir(new PantallaRecepcion());

echo "<h2>BIBLIOTECA MUNICIPAL</h2>";
echo "<h3>CONTROL DE PRESTAMOS</h3>";

$prestamos->registrarVencimiento("Juan Mamani");


?>
