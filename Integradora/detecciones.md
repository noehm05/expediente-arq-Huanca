# Detecciones SOLID

## 1. SRP – Responsabilidad Única

Donde: En `GestorDeEstadias`, dentro de `RegistrarSalida()`.

Porque vi que esta clase esta haciendo varias cosas juntas: calcula el precio, guarda la estadia, muestra el ticket y manda el mensaje por WhatsApp. Por eso no tiene una sola responsabilidad y se puede separar mejor.

## 2. OCP – Abierto/Cerrado

Donde en el `switch` que está dentro de `RegistrarSalida()`.

Porque para agregar otro tipo de vehiculo tendría que entrar y modificar ese `switch`. La idea de OCP es poder agregar nuevas opciones sin tener que cambiar el codigo que ya esta funcionando.

## 3. DIP – Inversión de Dependencias

Dónde en `GestorDeEstadias`, cuando usa `new BaseDeDatosParqueo()` y `new WhatsAppDelEdificio()`.

Porque en `GestorDeEstadias`, cuando usa `new BaseDeDatosParqueo()` y `new WhatsAppDelEdificio()`. El gestor esta dependiendo directamente de esas clases. Si despues quisiera cambiar la forma de guardar los datos o enviar los mensajes, tendría que modificar el gestor. Sería mejor trabajar con interfaces o abstracciones.

