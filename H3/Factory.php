<?php
//FACTORY
interface IAviso
{
    public function enviar($mensaje);
}
//  AVISO POR CORREO

class AvisoCorreo implements IAviso
{
    public function enviar($mensaje)
    {
        return "Aviso enviado por CORREO: " . $mensaje;
    }
}

// AVISO POR SMS

class AvisoSMS implements IAviso
{
    public function enviar($mensaje)
    {
        return "Aviso enviado por SMS: " . $mensaje;
    }
}

// AVISO EN EL SISTEMA

class AvisoSistema implements IAviso
{
    public function enviar($mensaje)
    {
        return "Aviso mostrado en el SISTEMA: " . $mensaje;
    }
}

//  FACTORY

class AvisoFactory
{
    public static function crearAviso($tipo)
    {
        switch (strtolower($tipo))
        {
            case "correo":
                return new AvisoCorreo();

            case "sms":
                return new AvisoSMS();

            case "sistema":
                return new AvisoSistema();

            default:
                throw new Exception("Tipo de aviso no válido.");
        }
    }
}

//  PRUEBA DEL FACTORY

try
{
    // Creamos un aviso de correo
    $aviso1 = AvisoFactory::crearAviso("correo");
    echo $aviso1->enviar("Su venta fue registrada correctamente.");
    echo "<br><br>";


    // Creamos un aviso SMS
    $aviso2 = AvisoFactory::crearAviso("sms");
    echo $aviso2->enviar("Su pedido está listo para recoger.");
    echo "<br><br>";


    // Creamos un aviso del sistema
    $aviso3 = AvisoFactory::crearAviso("sistema");
    echo $aviso3->enviar("Stock actualizado correctamente.");
    echo "<br><br>";
}
catch (Exception $e)
{
    echo "Error: " . $e->getMessage();
}

?>
