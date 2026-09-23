namespace Integradora.Parqueo;

// Refactor: Noelia Huanca Mamani
public class CalculadorTarifa
{
    public decimal Calcular(string tipo, int horas)
    {
        decimal tarifa = 5;
        if (tipo == "moto")
            tarifa = 3;
        else if (tipo == "residente")
            tarifa = 1;
        return tarifa * horas;
    }
}

public class GestorDeEstadias
{
    public void RegistrarSalida(string placa, string tipo, int horas)
    {
        CalculadorTarifa calculador = new CalculadorTarifa();
        decimal total = calculador.Calcular(tipo, horas);

        Console.WriteLine("----- TICKET -----");
        Console.WriteLine($"Placa: {placa}");
        Console.WriteLine($"Tipo: {tipo}");
        Console.WriteLine($"Horas: {horas}");
        Console.WriteLine($"Total: {total} Bs");
    }
}

public static class Demo
{
    public static void Correr()
    {
        GestorDeEstadias gestor = new GestorDeEstadias();

        gestor.RegistrarSalida("1234-ABC", "auto", 3);
    }
}
