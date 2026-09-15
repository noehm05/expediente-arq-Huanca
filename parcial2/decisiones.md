P2.1 - Decisiones

(Situación 1 - Observer)
Elegí Observer porque en este caso se necesita avisar a varias personas o módulos cuando un préstamo vence.
En vez de que el módulo de préstamos llame uno por uno, los interesados pueden suscribirse para recibir el aviso.
Así, si después se agrega otro interesado, no tendría que cambiar todo el módulo de préstamos.

(Situación 2 - Strategy)
Elegí Strategy porque la multa no se calcula igual para todos los tipos de socios.
Cada tipo puede tener su propia forma de calcular la multa y así no se tendría que llenar el código de muchos if/else.
También ayuda a no repetir el mismo cálculo en el módulo de reportes.

(Situación 3 - Adapter)
Elegí Adapter porque el sistema externo de la biblioteca utiliza un formato diferente al nuestro.
Tiene otros nombres para sus métodos, fechas y códigos que nuestro sistema no maneja.
El Adapter sirve para hacer esa conversión sin tener que modificar el sistema externo.


(P2.3 - Conexion con SOLID)
El principio SOLID que se relaciona con mi solución es Open/Closed Principle (OCP).
Se puede ver porque el módulo de préstamos no necesita modificarse cuando se agrega un nuevo interesado.
Solo se crea otra clase que implemente IInteresadoPrestamo y se puede suscribir.
Así se pueden agregar nuevos avisos sin cambiar lo que ya funciona.
