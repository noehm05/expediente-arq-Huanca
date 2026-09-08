// ----- Cura I -----NOELIA HUANCA MAMANI

public interface IRegistrarPedido
{
    void RegistrarPedido(string material, int cantidad);
}
public class Vendedor : IRegistrarPedido
{
    public void RegistrarPedido(string material, int cantidad)
        => Console.WriteLine($"[VEND] Pedido: {cantidad} x {material}");
}

// ----- Cura D ----- NOELIA HUANCA MAMANI

public interface IRepositorioPedidos
{
    void GuardarPedido(string cliente, string material, int cantidad, decimal total);
}
public interface INotificador
{
    void Enviar(string mensaje);
}
public class GestorDePedidos
{
    private IRepositorioPedidos repositorio;
    private INotificador notificador;

    public GestorDePedidos(IRepositorioPedidos repositorio, INotificador notificador)
    {
        this.repositorio = repositorio;
        this.notificador = notificador;
    }
    public void ProcesarPedido(string cliente, string material, int cantidad, decimal total)
    {
        repositorio.GuardarPedido(cliente, material, cantidad, total);
        notificador.Enviar($"Pedido de {material} registrado");
    }
}
