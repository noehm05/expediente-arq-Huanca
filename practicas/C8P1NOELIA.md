¿Qué es genuinamente único en mi dominio?
No encontré un candidato genuinamente único en mi sistema.
Las clases principales de mi librería, como Usuario, Producto, Venta, Categoría y MovimientoStock, necesitan permitir múltiples registros.
Por eso no sería correcto convertir alguna de ellas en Singleton solamente para aplicar el patrón.
La conexión a la base de datos podría parecer un candidato, pero en mi diseño utilizo IProductoRepositorio para aplicar DIP y evitar depender directamente de una conexión única.
Por esta razón decidí no utilizar Singleton en mi sistema.
